<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Agensi;

use App\Mail\TicketSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class AdminTicketController extends Controller
{
    public function index(Request $request)
    {
        // Initialize the query for fetching tickets
        $tickets = Ticket::query();

        // Apply filters based on request parameters
        if ($request->has('search') && $request->search) {
            $tickets->where('id', $request->search)
                    ->orWhere('subject', 'like', '%' . $request->search . '%');
        }

        // Filter by Type
        if ($request->has('search_type') && $request->search_type) {
            $tickets->where('type', $request->search_type);
        }

        // Filter by Severity
        if ($request->has('search_severity') && $request->search_severity) {
            $tickets->where('severity', $request->search_severity);
        }

        // Filter by Status
        if ($request->has('search_status') && $request->search_status) {
            $tickets->where('status', $request->search_status);
        }

        // Filter by Title
        if ($request->has('search_title') && $request->search_title) {
            $tickets->where('subject', 'like', '%' . $request->search_title . '%');
        }

        // Filter by Date
        if ($request->has('search_date') && $request->search_date) {
            $tickets->whereDate('created_at', $request->search_date);
        }

        // Fetch distinct filter options
        $types = Ticket::select('type')->distinct()->get()->pluck('type');
        $severities = Ticket::select('severity')->distinct()->get()->pluck('severity');
        $statuses = Ticket::select('status')->distinct()->get()->pluck('status');

        // Paginate the results
        $tickets = $tickets->paginate($request->input('per_page', 10));

        // Return the view with the filtered tickets and filter options
        return view('admin.tickets.index', compact('tickets', 'types', 'severities', 'statuses'));
    }

    public function create()
    {
        // Fetch the agensis from the database
        $agensis = Agensi::all();

        // Pass the agensis to the view
        return view('admin.tickets.create', compact('agensis'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $data = $request->validate([
            'agensi_tid' => 'required',
            'subject' => 'required|string|max:255',
            'equipment' => 'required|string',
            'quantity' => 'required|integer',
            'part_no' => 'required|string',
            'remarks' => 'nullable|string',
            'report_description' => 'required|string',
            'service_details' => 'required|string',
            'type' => 'required|string|in:pm,cm,cr',
            'severity' => 'required|string|in:critical,significant,moderate,minor,low',
            'attachments.*' => 'nullable|file|mimes:doc,docx,xls,xlsx,ppt,pptx,pdf,jpg,jpeg,png',
        ]);

        // Handle attachments
        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public');
                $attachments[] = $path;
            }
            $data['attachments'] = json_encode($attachments);
        } else {
            $data['attachments'] = null;
        }

        // Assign the authenticated user's ID to the 'user_id' field
        $data['user_id'] = auth()->user()->id;

        // Attempt to create the ticket and send the email
        try {
            // Create the ticket
            $ticket = Ticket::create($data);

            // Attempt to send the email
            try {
                Mail::to('ehs.v1mail@gmail.com')->send(new TicketSubmitted($ticket));
            } catch (\Exception $mailException) {
                // Handle email sending failure
                \Log::error('Email failed to send: ' . $mailException->getMessage());
                // Redirect to index with an error message
                return redirect()->route('admin.tickets.index')->with('error', 'Ticket created, but failed to send email notification.');
            }

            // Redirect to index with a success message
            return redirect()->route('admin.tickets.index')->with('success', 'Ticket created and email notification sent successfully.');

        } catch (\Exception $e) {
            // Handle ticket creation failure
            \Log::error('Ticket creation failed: ' . $e->getMessage());
            // Redirect to index with an error message
            return redirect()->route('admin.tickets.index')->with('error', 'Failed to create ticket.');
        }
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('admin.tickets.show', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('admin.tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'subject' => 'required|string|max:255',
            'equipment' => 'required|string',
            'quantity' => 'required|integer',
            'part_no' => 'required|string',
            'remarks' => 'nullable|string',
            'report_description' => 'required|string',
            'service_details' => 'required|string',
            'attachments.*' => 'nullable|file|mimes:doc,docx,xls,xlsx,ppt,pptx,pdf,jpg,jpeg,png',
            'status' => 'required|string|in:submitted,verified,resolved,closed',
        ]);

        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public');
                $attachments[] = $path;
            }
            $data['attachments'] = json_encode($attachments);
        }

        $ticket = Ticket::findOrFail($id);
        // Attempt to update the ticket
        try {
            $ticket->update($data);

            // Success notification
            Session::flash('success', 'Ticket updated successfully.');

            // Redirect back to ticket show page or any other page
            return redirect()->route('admin.tickets.show', $ticket->id);
        } catch (\Exception $e) {
            // Error notification
            Session::flash('error', 'Failed to update ticket.');

            // Redirect back with error message
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to update ticket.']);
        }
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        // Attempt to delete the ticket
        try {
            $ticket->delete();

            // Success notification
            Session::flash('success', 'Ticket deleted successfully.');

            // Redirect back to tickets index page or any other page
            return redirect()->route('admin.tickets.index');
        } catch (\Exception $e) {
            // Error notification
            Session::flash('error', 'Failed to delete ticket.');

            // Redirect back with error message
            return redirect()->back()->withErrors(['error' => 'Failed to delete ticket.']);
        }
    }

    public function print(Request $request)
    {
        // Fetch tickets along with user and agensi relationships
        $tickets = Ticket::with(['user', 'agensi'])->get();
        // // Get the selected ticket IDs from the query parameter
        $ticketIds = explode(',', $request->query('ticket_ids'));

        // // Retrieve the selected tickets from the database
        $tickets = Ticket::whereIn('id', $ticketIds)->get();
        
        // Render a view to display the tickets for printing
        return view('tickets.print', compact('tickets'));
    }
}

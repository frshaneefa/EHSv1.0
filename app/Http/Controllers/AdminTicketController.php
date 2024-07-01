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
        $tickets = Ticket::query();

        // Filter by Ticket ID
        if ($request->has('search_ticket_id') && $request->search_ticket_id) {
            $tickets->where('id', $request->search_ticket_id);
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

        // Fetch all the necessary filter options
        $types = Ticket::select('type')->distinct()->get()->pluck('type');
        $severities = Ticket::select('severity')->distinct()->get()->pluck('severity');
        $statuses = Ticket::select('status')->distinct()->get()->pluck('status');

        $tickets = $tickets->paginate(10);

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
        $data = $request->validate([
            'agensi_tid' => 'required',
            'subject' => 'required|string|max:255',
            'equipment' => 'required|string',
            'quantity' => 'required|integer',
            'part_no' => 'required|string',
            'remarks' => 'nullable|string',
            'report_description' => 'required|string',
            'service_details' => 'required|string',
            'type' => 'required|string|in:pm,cm,cr',   // Validation rule for type
            'severity' => 'required|string|in:critical,significant,moderate,minor,low', // Validation rule for severity
            'attachments.*' => 'nullable|file|mimes:doc,docx,xls,xlsx,ppt,pptx,pdf,jpg,jpeg,png',
        ]);

        // Check if attachments are present
        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public');
                $attachments[] = $path;
            }
            $data['attachments'] = json_encode($attachments);
        } else {
            // No attachments provided
            $data['attachments'] = null;
        }

        // Assign the authenticated user's ID to the 'user_id' field
        $data['user_id'] = auth()->user()->id;

        // Attempt to create the ticket
        try {
            $ticket = Ticket::create($data);

            // Send email notification
            Mail::to('ehs.v1mail@gmail.com')->send(new TicketSubmitted($ticket));

            // Success notification
            Session::flash('success', 'Ticket created successfully.');

            // Redirect back to index or any other page
            return redirect()->route('admin.tickets.index');
        } catch (\Exception $e) {
            // Error notification
            Session::flash('error', 'Failed to create ticket.');

            // Redirect back with error message
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create ticket.']);
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
        // // Get the selected ticket IDs from the query parameter
        $ticketIds = explode(',', $request->query('ticket_ids'));

        // // Retrieve the selected tickets from the database
        $tickets = Ticket::whereIn('id', $ticketIds)->get();
        
        // Render a view to display the tickets for printing
        return view('tickets.print', compact('tickets'));
    }
}

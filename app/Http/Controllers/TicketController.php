<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Agensi;
use App\Mail\TicketSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Initialize the tickets query for the authenticated user
        $tickets = Ticket::where('user_id', $user->id);

        // Apply filters based on the request parameters
        if ($request->has('search_ticket_id') && $request->search_ticket_id) {
            $tickets->where('id', $request->search_ticket_id);
        }
        if ($request->has('search_type') && $request->search_type) {
            $tickets->where('type', $request->search_type);
        }
        if ($request->has('search_severity') && $request->search_severity) {
            $tickets->where('severity', $request->search_severity);
        }
        if ($request->has('search_status') && $request->search_status) {
            $tickets->where('status', $request->search_status);
        }
        if ($request->has('search_title') && $request->search_title) {
            $tickets->where('subject', 'like', '%' . $request->search_title . '%');
        }
        if ($request->has('search_date') && $request->search_date) {
            $tickets->whereDate('created_at', $request->search_date);
        }

        // Fetch distinct filter options
        $types = Ticket::select('type')->distinct()->get()->pluck('type');
        $severities = Ticket::select('severity')->distinct()->get()->pluck('severity');
        $statuses = Ticket::select('status')->distinct()->get()->pluck('status');

        // Paginate the results
        $tickets = $tickets->paginate(10);

        return view('tickets.index', compact('tickets', 'types', 'severities', 'statuses'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
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
            $data['attachments'] = null;
        }

        // Assign the authenticated user's ID to the 'user_id' field
        $data['user_id'] = auth()->user()->id;
        // Assign the authenticated user's agensi ID to the 'agensi_tid' field
        $data['agensi_tid'] = auth()->user()->agensi_id;

        // Attempt to create the ticket
        try {
            $ticket = Ticket::create($data);

            // Send email notification
            Mail::to('ehs.v1mail@gmail.com')->send(new TicketSubmitted($ticket));

            // Success notification
            Session::flash('success', 'Ticket created successfully.');

            // Redirect back to index or any other page
            return redirect()->route('tickets.create');
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

        // Ensure the user is authorized to view this ticket
        if ($ticket->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('tickets.show', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        // Ensure the user is authorized to edit this ticket
        if ($ticket->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        // Ensure the user is authorized to update this ticket
        if ($ticket->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $data = $request->validate([
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

        if ($request->hasFile('attachments')) {
            $attachments = json_decode($ticket->attachments, true) ?? [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public');
                $attachments[] = $path;
            }
            $data['attachments'] = json_encode($attachments);
        }

        $ticket->update($data);

        return redirect()->route('tickets.show', $ticket->id);
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        // Ensure the user is authorized to delete this ticket
        if ($ticket->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $ticket->delete();

        return redirect()->route('tickets.index');
    }

    public function print(Request $request)
    {
        // Get the selected ticket IDs from the query parameter
        $ticketIds = explode(',', $request->query('ticket_ids'));

        // Retrieve the selected tickets from the database
        $tickets = Ticket::whereIn('id', $ticketIds)->get();
        
        // Render a view to display the tickets for printing
        return view('tickets.print', compact('tickets'));
    }
}



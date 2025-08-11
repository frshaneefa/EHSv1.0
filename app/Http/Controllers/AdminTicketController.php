<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Agensi;
use App\Models\User;

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
        $tickets = Ticket::with('user', 'agensi'); // Eager load related user and agensi

        // Apply filters if any
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;

            $tickets->where(function ($query) use ($searchTerm) {
                // Search by ID, subject, sender name, type, severity, status, and agensi
                $query->where('id', $searchTerm)
                    ->orWhere('subject', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('user', function($q) use ($searchTerm) {
                        $q->where('name', 'like', '%' . $searchTerm . '%'); // Assuming 'name' is the sender name
                    })
                    ->orWhere('type', 'like', '%' . $searchTerm . '%')
                    ->orWhere('severity', 'like', '%' . $searchTerm . '%')
                    ->orWhere('status', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('agensi', function($q) use ($searchTerm) {
                        $q->where('name', 'like', '%' . $searchTerm . '%'); // Assuming 'name' is the agensi name
                    })
                    ->orWhereHas('assignedStaff', function($q) use ($searchTerm) {
                        $q->where('name', 'like', '%' . $searchTerm . '%'); // Assuming 'name' is the assigned staff name
                    });
            });
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

        if ($request->has('type')) {
            $tickets->where('type', $request->input('type'));
        }
        
        if ($request->has('severity')) {
            $tickets->where('severity', $request->input('severity'));
        }
        
        if ($request->has('status')) {
            $tickets->where('status', $request->input('status'));
        }

        // Fetch distinct filter options
        $types = Ticket::select('type')->distinct()->get()->pluck('type');
        $severities = Ticket::select('severity')->distinct()->get()->pluck('severity');
        $statuses = Ticket::select('status')->distinct()->get()->pluck('status');

        // Fetch total counts for each ticket status
        $submittedCount = Ticket::where('status', 'submitted')->count();
        $verifiedCount = Ticket::where('status', 'verified')->count();
        $resolvedCount = Ticket::where('status', 'resolved')->count();
        $closedCount = Ticket::where('status', 'closed')->count();

        // Get the tickets for display with eager loading
        $tickets = $tickets->with('user', 'agensi')->paginate($request->input('per_page', 10));

        // Fetch staff members to assign
        $staffMembers = User::where('usertype', 'staff')->get(); // Adjust the query as needed

        // Return the view with the counts and tickets
    return view('admin.tickets.index', compact('tickets', 'submittedCount', 'verifiedCount', 'resolvedCount', 'closedCount', 'types', 'severities', 'statuses', 'staffMembers'));
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

        // Initialize an array to hold attachment paths
        $attachmentPaths = [];

        // Handle file uploads
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $originalName = $file->getClientOriginalName(); // Get original file name
                $path = $file->storeAs('attachments', $originalName, 'public'); // Save with original name
                $attachmentPaths[] = $path; // Store path for later use
            }
        }

        // Assign the authenticated user's ID to the 'user_id' field
        $data['user_id'] = auth()->user()->id;

        // Convert attachment paths to JSON format if it's not empty
        if (!empty($attachmentPaths)) {
            $data['attachments'] = json_encode($attachmentPaths); // Store path in JSON format
        } else {
            $data['attachments'] = null; // Set to null if no attachments
        }

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
        $ticket->attachments = json_decode($ticket->attachments, true); // Decode attachments
        
        return view('admin.tickets.show', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('admin.tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        
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

        // Initialize an array to hold attachment paths
        $attachmentPaths = [];

        // Handle file uploads
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $originalName = $file->getClientOriginalName(); // Get original file name
                $path = $file->storeAs('attachments', $originalName, 'public'); // Save with original name
                $attachmentPaths[] = $path; // Store path for later use
            }

            // Convert attachment paths to JSON format
            if (!empty($attachmentPaths)) {
                $data['attachments'] = json_encode($attachmentPaths); // Store path in JSON format
            }
        }
        
        $ticket->status = $request->input('status');

        // Update timestamps based on status
        if ($ticket->status === 'verified') {
            $ticket->verified_at = now();
        } elseif ($ticket->status === 'resolved') {
            $ticket->resolved_at = now();
        } elseif ($ticket->status === 'closed') {
            $ticket->closed_at = now();
        }

        $ticket->save();
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

        return redirect()->route('admin.tickets.index')->with('success', 'Ticket updated successfully!');
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

    public function assignStaff(Request $request, Ticket $ticket)
    {
        $request->validate([
            'assigned_staff_id' => 'nullable|exists:users,id',
        ]);

        $ticket->assigned_staff_id = $request->assigned_staff_id;
        $ticket->save();

        return redirect()->route('admin.tickets.index')->with('success', 'Staff assigned successfully.');
    }
}

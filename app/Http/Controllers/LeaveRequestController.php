<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Number of items per page
        $search = $request->input('search'); // Search query

        // Start building the query
        $query = LeaveRequest::query();

        // Check if the user is an admin or staff
        if (Auth::user()->is_admin) {
            // Admin can see all leave requests
            if ($search) {
                $query->where('id', 'like', "%$search%")
                    ->orWhere('leave_type', 'like', "%$search%");
            }
        } else {
            // Staff can only see their own leave requests
            $query->where('user_id', Auth::id());

            // Apply search filter if provided
            if ($search) {
                $query->where('id', 'like', "%$search%")
                    ->orWhere('leave_type', 'like', "%$search%");
            }
        }

        // Paginate the results
        $leaveRequests = $query->paginate($perPage);

        // Return the view with paginated results
        return view('leave_requests.index', compact('leaveRequests'));
    }

    // Show the form for creating a new leave request.
    public function create()
    {
        return view('leave_requests.create');
    }

    // Store a newly created leave request in the database.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'leave_type' => 'required|in:annual,emergency,medical',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:jpeg,png,pdf,doc,docx|max:2048', // Validate file upload
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }

        LeaveRequest::create([
            'user_id' => Auth::id(),
            'leave_type' => $validated['leave_type'],
            'start_date' => Carbon::parse($validated['start_date']),
            'end_date' => Carbon::parse($validated['end_date']),
            'reason' => $validated['reason'],
            'attachment' => $attachmentPath, // Save the file path
        ]);

        return redirect()->route('leave-requests.index')->with('success', 'Leave request submitted successfully.');
    }

    // Display the specified leave request.
    public function show($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        return view('leave_requests.show', compact('leaveRequest'));
    }
}

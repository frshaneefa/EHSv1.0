<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminLeaveRequestController extends Controller
{
    // Display a listing of all leave requests.
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Number of items per page
        $search = $request->input('search'); // Search query

        // Start building the query
        $query =  LeaveRequest::query();

        // Apply search filter if provided
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('id', 'like', "%$search%")
                    ->orWhere('leave_type', 'like', "%$search%");
            });
        }

        // Paginate the results
        $leaveRequests = $query->paginate($perPage);
        // $leaveRequests = LeaveRequest::all();

        return view('admin.leave_requests.index', compact('leaveRequests'));
    }

    // Approve a specific leave request.
    public function approve($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->status = 'approved';
        $leaveRequest->save();

        // Optionally, send notification to the staff member

        return redirect()->route('admin.leave-requests.index')->with('success', 'Leave request approved.');
    }

    // Reject a specific leave request.
    public function reject($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->status = 'rejected';
        $leaveRequest->save();

        // Optionally, send notification to the staff member

        return redirect()->route('admin.leave-requests.index')->with('success', 'Leave request rejected.');
    }

    // Show the form for creating a new leave request (on behalf of a staff member).
    public function create()
    {
        return view('admin.leave_requests.create');
    }

    // Store a newly created leave request in the database (on behalf of a staff member).
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'leave_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'nullable|string',
        ]);

        LeaveRequest::create([
            'user_id' => $request->user_id,
            'leave_type' => $request->leave_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
        ]);

        return redirect()->route('admin.leave-requests.index')->with('success', 'Leave request created successfully.');
    }

    // Show the details of a specific leave request.
    public function show($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        return view('admin.leave_requests.show', compact('leaveRequest'));
    }

    public function updateStatus(Request $request, $id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $status = $request->input('status');

        if (in_array($status, ['approved', 'rejected'])) {
            $leaveRequest->status = $status;
            $leaveRequest->save();
        }

        return redirect()->route('admin.leave-requests.index')->with('success', 'Status updated successfully.');
    }

    public function destroy($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->delete();

        return redirect()->route('admin.leave-requests.index')->with('success', 'Leave request deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        // Find the leave request by ID
        $leaveRequest = LeaveRequest::findOrFail($id);

        // Validate the request status
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        // Update the status of the leave request
        $leaveRequest->update([
            'status' => $validated['status'],
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.leave-requests.index')->with('success', 'Leave request updated successfully.');
    }

    public function adminDownloadAttachment($id)
    {
        // Find the leave request by ID
        $leaveRequest = LeaveRequest::findOrFail($id);

        // Check if the attachment exists
        if (!$leaveRequest->attachment || !Storage::exists($leaveRequest->attachment)) {
            return redirect()->route('admin.leave-requests.index')->with('error', 'Attachment not found.');
        }

        // Extract the file path and original file name
        $filePath = $leaveRequest->attachment;
        $originalFileName = basename($filePath);

        // Get additional information for the new file name
        $userName = $leaveRequest->user->name;
        $requestId = $leaveRequest->id;
        $createdDate = $leaveRequest->created_at->format('Ymd'); // Format the date as needed

        // Create a new file name
        $newFileName = "{$userName}_Request{$requestId}_{$createdDate}.{$this->getFileExtension($originalFileName)}";

        // Debugging: Log the new file name
        \Log::info("New file name: $newFileName");

        // Prepare the response for file download with the new file name
        return Storage::download($filePath, $newFileName);
    }

    /**
     * Get the file extension from the original file name.
     *
     * @param string $fileName
     * @return string
     */
    private function getFileExtension($fileName)
    {
        return pathinfo($fileName, PATHINFO_EXTENSION);
    }

}

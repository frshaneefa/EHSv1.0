<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Leave Request Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('leave-requests.index') }}">All Leave Requests</a></li>
                                <li class="breadcrumb-item active">Request #{{ $leaveRequest->id }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        <h3 class="text-lg font-semibold mb-4">Leave Request Details</h3>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Request ID</th>
                                                <td>#{{ $leaveRequest->id }}</td>
                                            </tr>
                                            <tr>
                                                <th>User Name</th>
                                                <td>{{ $leaveRequest->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Leave Type</th>
                                                <td>{{ ucfirst($leaveRequest->leave_type) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Start Date</th>
                                                <td>{{ $leaveRequest->start_date }}</td>
                                            </tr>
                                            <tr>
                                                <th>End Date</th>
                                                <td>{{ $leaveRequest->end_date }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>
                                                    @if ($leaveRequest->status === 'pending')
                                                        <span class="badge badge-warning">Pending</span>
                                                    @elseif ($leaveRequest->status === 'approved')
                                                        <span class="badge badge-success">Approved</span>
                                                    @elseif ($leaveRequest->status === 'rejected')
                                                        <span class="badge badge-danger">Rejected</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Reason</th>
                                                <td>{{ $leaveRequest->reason ?? 'N/A' }}</td>
                                            </tr>
                                            <tr>
                                                <th>Submitted At</th>
                                                <td>{{ $leaveRequest->created_at->setTimezone('Asia/Kuala_Lumpur')->format('d/m/y H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Attachment</th>
                                                <td>
                                                    @if ($leaveRequest->attachment)
                                                    <a href="{{ route('admin.leave-requests.download', $leaveRequest->id) }}" class="btn btn-primary">Download Attachment</a>
                                                    @else
                                                        No attachment provided.
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="mt-4">
                                            @if ($leaveRequest->status === 'pending')
                                                <form action="{{ route('admin.leave-requests.update', $leaveRequest->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" name="status" value="approved" class="btn btn-success" onclick="return confirm('Are you sure you want to approve this leave request?')">Approve</button>
                                                </form>

                                                <form action="{{ route('admin.leave-requests.update', $leaveRequest->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" name="status" value="rejected" class="btn btn-danger" onclick="return confirm('Are you sure you want to reject this leave request?')">Reject</button>
                                                </form>
                                            @endif
                                            <a href="{{ route('admin.leave-requests.index') }}" class="btn btn-secondary">Back to List</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
    </div>
</x-admin-layout>

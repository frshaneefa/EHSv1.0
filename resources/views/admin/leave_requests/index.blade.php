<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Leave Requests</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">All Leave Requests</li>
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
                                        <div class="overflow-x-auto">
                                            <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                                                <div>
                                                    <select id="entriesPerPage" class="form-select" aria-label="Entries per page">
                                                        <option {{ request('per_page') == 10 ? 'selected' : '' }} value="10">Show 10</option>
                                                        <option {{ request('per_page') == 20 ? 'selected' : '' }} value="20">Show 20</option>
                                                        <option {{ request('per_page') == 50 ? 'selected' : '' }} value="50">Show 50</option>
                                                        <option {{ request('per_page') == 100 ? 'selected' : '' }} value="100">Show 100</option>
                                                    </select>
                                                </div>
                                                <div style="display: flex; gap: 0.3rem;">
                                                    <form action="{{ route('admin.leave-requests.index') }}" method="GET" style="display: flex; gap: 0.3rem;">
                                                        <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                                                        <input type="text" name="search" class="form-control" placeholder="Search by Request ID, Type" value="{{ request('search') }}">
                                                        <button type="submit" class="btn btn-primary">Search</button>
                                                    </form>
                                                    <form action="{{ route('admin.leave-requests.index') }}" method="GET">
                                                        <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                                                        <button type="submit" class="btn btn-secondary">Undo Search</button>
                                                    </form>
                                                </div>
                                            </div>

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Request ID</th>
                                                        <th>Type</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Status</th>
                                                        <th>Created At</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($leaveRequests as $index => $leaveRequest)
                                                        <tr>
                                                            <td>{{ $index + 1 + (($leaveRequests->currentPage() - 1) * $leaveRequests->perPage()) }}</td>
                                                            <td>#{{ $leaveRequest->id }}</td>
                                                            <td>{{ $leaveRequest->leave_type }}</td>
                                                            <td>{{ $leaveRequest->start_date }}</td>
                                                            <td>{{ $leaveRequest->end_date }}</td>
                                                            <td>
                                                                @if ($leaveRequest->status === 'pending')
                                                                    <form action="{{ route('admin.leave-requests.update-status', $leaveRequest->id) }}" method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <button type="submit" name="status" value="approved" class="btn btn-success btn-sm">Approve</button>
                                                                        <button type="submit" name="status" value="rejected" class="btn btn-danger btn-sm">Reject</button>
                                                                    </form>
                                                                @elseif ($leaveRequest->status === 'approved')
                                                                    <span class="status-box status-approved">Approved</span>
                                                                @elseif ($leaveRequest->status === 'rejected')
                                                                    <span class="status-box status-rejected">Rejected</span>
                                                                @endif
                                                            </td>
                                                            <td>{{ $leaveRequest->created_at->setTimezone('Asia/Kuala_Lumpur')->format('d/m/y H:i') }}</td>
                                                            <td>
                                                                <div style="display: flex; gap: 0.5rem;">
                                                                    <a href="{{ route('admin.leave-requests.show', $leaveRequest->id) }}" class="btn btn-info btn-sm">View</a>
                                                                    <form action="{{ route('admin.leave-requests.destroy', $leaveRequest->id) }}" method="POST" style="display: inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this leave request?')">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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

{{ $leaveRequests->appends(request()->query())->links() }}

<script>
    document.getElementById('entriesPerPage').addEventListener('change', function() {
        let perPage = this.value;
        let url = new URL(window.location.href);
        url.searchParams.set('per_page', perPage);
        window.location.href = url.toString();
    });
</script>

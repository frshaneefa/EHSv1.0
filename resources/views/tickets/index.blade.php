<x-user-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">My Tickets</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">All Tickets</li>
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
                                                        <form action="{{ route('tickets.index') }}" method="GET" style="display: flex; gap: 0.3rem;">
                                                            <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                                                            <input type="text" name="search" class="form-control" placeholder="Search by Ticket ID, Title" value="{{ request('search') }}">
                                                            <button type="submit" class="btn btn-primary">Search</button>
                                                        </form>
                                                        <form action="{{ route('tickets.index') }}" method="GET">
                                                            <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                                                            <button type="submit" class="btn btn-secondary">Undo Search</button>
                                                        </form>
                                                        <button type="button" id="print-button" class="print-button btn btn-success">Print PDF</button>
                                                    </div>
                                                </div>
                                        
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="select-all" onclick="toggleSelectAll()"></th>
                                                        <th>No.</th>
                                                        <th>Ticket ID</th>
                                                        <th>Type</th>
                                                        <th>Severity</th>
                                                        <th>Title</th>
                                                        <th>Status</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($tickets as $index => $ticket)
                                                        @if($ticket->user_id === auth()->id())
                                                            <tr>
                                                                <td><input type="checkbox" class="ticket-checkbox" value="{{ $ticket->id }}"></td>
                                                                <td>{{ $index + 1 + (($tickets->currentPage() - 1) * $tickets->perPage()) }}</td>
                                                                <td>#{{ $ticket->id }}</td>
                                                                <td>{{ $ticket->type }}</td>
                                                                <td>{{ $ticket->severity }}</td>
                                                                <td>{{ $ticket->subject }}</td>
                                                                <td>
                                                                    @if ($ticket->status === 'submitted')
                                                                        <span class="status-box status-submitted">Submitted</span>
                                                                    @elseif ($ticket->status === 'verified')
                                                                        <span class="status-box status-verified">Verified</span>
                                                                    @elseif ($ticket->status === 'resolved')
                                                                        <span class="status-box status-resolved">Resolved</span>
                                                                    @elseif ($ticket->status === 'closed')
                                                                        <span class="status-box status-closed">Closed</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $ticket->created_at->setTimezone('Asia/Kuala_Lumpur')->format('d/m/y H:i') }}</td>
                                                                <td>
                                                                    <div style="display: flex; gap: 0.5rem;">
                                                                        <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info btn-sm">
                                                                            View
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endif
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
</x-user-layout>

{{ $tickets->withQueryString()->links() }}

<script>
    document.getElementById('entriesPerPage').addEventListener('change', function() {
        let perPage = this.value;
        let url = new URL(window.location.href);
        url.searchParams.set('per_page', perPage);
        window.location.href = url.toString();
    });

    document.getElementById('print-button').addEventListener('click', function(event) {
        event.preventDefault();
        const checkboxes = document.querySelectorAll('.ticket-checkbox:checked');
        const ticketIds = Array.from(checkboxes).map(checkbox => checkbox.value);
        if (ticketIds.length > 0) {
            const queryParams = new URLSearchParams({ ticket_ids: ticketIds.join(',') });
            window.location.href = `{{ route('tickets.print') }}?${queryParams.toString()}`;
        } else {
            alert('Please select at least one ticket to print.');
        }
    });

    function toggleSelectAll() {
        const selectAllCheckbox = document.getElementById('select-all');
        const checkboxes = document.querySelectorAll('.ticket-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    }
</script>

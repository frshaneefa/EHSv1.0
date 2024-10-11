<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Ticket Management</h1>
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
                                <!-- Info Card Section -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header bg-info">
                                                <h5 class="card-title">
                                                    <i class="fas fa-paper-plane"></i> Submitted Tickets
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <h1 class="text-center">{{ $submittedCount }}</h1>
                                                <p class="text-center">Total submitted tickets</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header bg-warning">
                                                <h5 class="card-title">
                                                    <i class="fas fa-check-circle"></i> Verified Tickets
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <h1 class="text-center">{{ $verifiedCount }}</h1>
                                                <p class="text-center">Total verified tickets</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header bg-success">
                                                <h5 class="card-title">
                                                    <i class="fas fa-tools"></i> Resolved Tickets
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <h1 class="text-center">{{ $resolvedCount }}</h1>
                                                <p class="text-center">Total resolved tickets</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header bg-secondary">
                                                <h5 class="card-title">
                                                    <i class="fas fa-times-circle"></i> Closed Tickets
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <h1 class="text-center">{{ $closedCount }}</h1>
                                                <p class="text-center">Total closed tickets</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                        <form action="{{ route('admin.tickets.index') }}" method="GET" style="display: flex; gap: 0.3rem;">
                                                            <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                                                            <input type="text" name="search" class="form-control" placeholder="Search by Ticket ID, Title" value="{{ request('search') }}">
                                                            <button type="submit" class="btn btn-primary">Search</button>
                                                        </form>
                                                        <form action="{{ route('admin.tickets.index') }}" method="GET">
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
                                                            <th>Ticket ID</th>
                                                            <th>Sender Name</th>
                                                            <th>Agensi</th>
                                                            <th>Title</th>
                                                            <th>Type</th>
                                                            <th>Severity</th>
                                                            <th>Status</th>
                                                            <th>Assigned Staff</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($tickets as $ticket)
                                                            <tr>
                                                                <td><input type="checkbox" class="ticket-checkbox" value="{{ $ticket->id }}"></td>
                                                                <td>#{{ $ticket->id }}</td>
                                                                <td>{{ $ticket->user->name }}</td>
                                                                <td>{{ $ticket->agensi->name }}</td>
                                                                <td>{{ $ticket->subject }}</td>
                                                                <td>{{ $ticket->type }}</td>
                                                                <td>{{ $ticket->severity }}</td>
                                                                <td>
                                                                    <!-- Flex container for icon and status -->
                                                                    <div class="d-flex align-items-center">
                                                                        <!-- Expand Icon Button -->
                                                                        <a href="#statusDetails_{{ $ticket->id }}" data-bs-toggle="collapse" aria-expanded="false" onclick="toggleIcon(this)">
                                                                            <div class="icon-circle">
                                                                                <i class="fas fa-plus icon-rotate"></i>
                                                                            </div>
                                                                        </a>

                                                                        <!-- Status Text -->
                                                                        <div class="ms-2">
                                                                            @if ($ticket->status === 'submitted')
                                                                                <span class="badge bg-info">Submitted</span>
                                                                            @elseif ($ticket->status === 'verified')
                                                                                <span class="badge bg-warning">Verified</span>
                                                                            @elseif ($ticket->status === 'resolved')
                                                                                <span class="badge bg-success">Resolved</span>
                                                                            @elseif ($ticket->status === 'closed')
                                                                                <span class="badge bg-secondary">Closed</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <!-- Collapsible Section with Timeline Icons -->
                                                                    <div class="collapse mt-2" id="statusDetails_{{ $ticket->id }}">
                                                                        <div class="timeline">
                                                                            <div class="timeline-item">
                                                                                <div class="timeline-icon created">
                                                                                    <i class="fas fa-paper-plane"></i>
                                                                                </div>
                                                                                <div class="timeline-content">                                                                                   
                                                                                    <b>Date : </b>{{ $ticket->created_at ? $ticket->created_at->format('d/m/y') : 'N/A' }}                                                                                   
                                                                                   <b>| Time : </b>{{ $ticket->created_at ? $ticket->created_at->format('H:i') : 'N/A' }}
                                                                                </div>
                                                                            </div>
                                                                            <div class="timeline-item">
                                                                                <div class="timeline-icon verified">
                                                                                    <i class="fas fa-check-circle"></i>
                                                                                </div>
                                                                                <div class="timeline-content">                                                                                    
                                                                                    <b>Date : </b>{{ $ticket->verified_at ? $ticket->verified_at->format('d/m/y') : 'N/A' }}                                                                                   
                                                                                    <b>| Time : </b>{{ $ticket->verified_at ? $ticket->verified_at->format('H:i') : 'N/A' }}
                                                                                </div>
                                                                            </div>
                                                                            <div class="timeline-item">
                                                                                <div class="timeline-icon resolved">
                                                                                    <i class="fas fa-tools"></i>
                                                                                </div>
                                                                                <div class="timeline-content">                                                                                    
                                                                                    <b>Date :</b> {{ $ticket->resolved_at ? $ticket->resolved_at->format('d/m/y') : 'N/A' }}
                                                                                    <b>| Time :</b> {{ $ticket->resolved_at ? $ticket->resolved_at->format('H:i') : 'N/A' }}
                                                                                </div>
                                                                            </div>
                                                                            <div class="timeline-item">
                                                                                <div class="timeline-icon closed">
                                                                                    <i class="fas fa-times-circle"></i>
                                                                                </div>
                                                                                <div class="timeline-content">
                                                                                   <b>Date :</b> {{ $ticket->closed_at ? $ticket->closed_at->format('d/m/y') : 'N/A' }}                                                                                   
                                                                                   <b>| Time :</b> {{ $ticket->closed_at ? $ticket->closed_at->format('H:i') : 'N/A' }} 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="assign-dropdown-container">
                                                                        <form action="{{ route('admin.tickets.assign', $ticket->id) }}" method="POST" style="display: inline;">
                                                                            @csrf
                                                                            <select id="assigned_staff_{{ $ticket->id }}" name="assigned_staff_id" class="form-select assign-dropdown" onchange="this.form.submit()">
                                                                                <option value="">Assign Staff</option>
                                                                                @foreach($staffMembers as $staff)
                                                                                    <option value="{{ $staff->id }}" {{ $ticket->assigned_staff_id == $staff->id ? 'selected' : '' }}>
                                                                                        {{ $staff->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('admin.tickets.show', $ticket->id) }}" class="btn btn-info btn-sm">View</a>
                                                                    <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                                    <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <!-- Custom Pagination Links -->
                                                <ul class="pagination">
                                                    <!-- Previous Button -->
                                                    @if ($tickets->onFirstPage())
                                                        <li class="paginate_button page-item previous disabled">
                                                            <a href="#" class="page-link">Previous</a>
                                                        </li>
                                                    @else
                                                        <li class="paginate_button page-item previous">
                                                            <a href="{{ $tickets->previousPageUrl() }}" class="page-link">Previous</a>
                                                        </li>
                                                    @endif

                                                    <!-- Pagination Numbers -->
                                                    @for ($i = 1; $i <= $tickets->lastPage(); $i++)
                                                        <li class="paginate_button page-item {{ $i == $tickets->currentPage() ? 'active' : '' }}">
                                                            <a href="{{ $tickets->url($i) }}" class="page-link">{{ $i }}</a>
                                                        </li>
                                                    @endfor

                                                    <!-- Next Button -->
                                                    @if ($tickets->hasMorePages())
                                                        <li class="paginate_button page-item next">
                                                            <a href="{{ $tickets->nextPageUrl() }}" class="page-link">Next</a>
                                                        </li>
                                                    @else
                                                        <li class="paginate_button page-item next disabled">
                                                            <a href="#" class="page-link">Next</a>
                                                        </li>
                                                    @endif
                                                </ul>
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

    function toggleIcon(element) {
        const icon = element.querySelector('.icon-rotate');
        icon.classList.toggle('rotate');
    }

    document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(button => {
        button.addEventListener('click', function() {
            let icon = this.querySelector('i');
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
        });
    });

</script>

<style>
    .card {
        border-radius: 8px; /* Optional: round the corners of the card */
        margin-bottom: 20px; /* Space below the card */
    }

        /* Style for the Assigned Staff Dropdown */
    .assign-dropdown-container {
        display: flex; /* Use flexbox for alignment */
        align-items: center; /* Center items vertically */
    }

    .assign-dropdown {
        padding: 0.375rem 0.75rem; /* Adjust padding for better sizing */
        border-radius: 0.25rem; /* Rounded corners */
        border: 1px solid #ced4da; /* Default border color */
        background-color: #ffffff; /* White background */
        transition: border-color 0.2s ease-in-out; /* Smooth transition for border color */
    }

    .assign-dropdown:focus {
        outline: none; /* Remove default outline */
        border-color: #007bff; /* Border color on focus */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Focus shadow effect */
    }

    .assign-dropdown option {
        padding: 0.5rem; /* Padding for options */
    }

    /* Style for the "Assign Staff" label */
    .assign-dropdown-label {
        margin-right: 0.5rem; /* Space between label and dropdown */
        font-weight: bold; /* Bold font for the label */
        color: #333; /* Dark color for the label */
    }

    .icon-circle {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: #e0e0e0; /* Grey background */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .icon-circle i {
        font-size: 12px;
        color: #555; /* Dark grey plus icon */
        transition: transform 0.3s ease;
    }

    .icon-circle:hover {
        background-color: #d0d0d0; /* Slightly darker grey on hover */
    }

    .icon-rotate.rotate {
        transform: rotate(90deg); /* Rotate 90 degrees when clicked */
    }

    /* Flex container to align icon and status inline */
    .d-flex {
        display: flex;
        align-items: center;
    }

    /* Margin to separate the icon and status */
    .ms-2 {
        margin-left: 8px;
    }

    /* Timeline Container */
    .timeline {
        position: relative;
        padding-left: 1px; /* Increased padding for larger icons */
        list-style: none;
        margin: 20px 0;
    }

    /* Timeline Item */
    .timeline-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        padding-left: 30px;
        font-size: 15px
    }

    /* Timeline Icon Container */
    .timeline-icon {
        width: 40px; /* Width of the icon container */
        height: 40px; /* Height of the icon container */
        border-radius: 50%; /* Makes the icon container circular */
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: white; /* Set the icon background to white */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Optional: add shadow for better visibility */
        position: relative; /* Position relative for proper alignment */
    }

    .timeline-icon i {
        font-size: 24px; /* Adjust icon size as needed */
        position: absolute; /* Position the icon absolutely within the container */
    }


    /* Colors for Each Icon */
    .timeline-icon.created i {
        color: #17a2b8; /* Green for Created */
    }

    .timeline-icon.verified i {
        color: #ffc107; /* Yellow for Verified */
    }

    .timeline-icon.resolved i {
        color: #28a745; /* Blue for Resolved */
    }

    .timeline-icon.closed i {
        color: grey; /* Red for Closed */
    }

    /* Timeline Content Styling */
    .timeline-content {
        padding-left: 40px; /* Adjust padding to match the icon size */
        background-color: #f9f9f9;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #e0e0e0;
        position: relative;
    }

    /* Vertical Line Between Timeline Items */
    .timeline-item:before {
        content: '';
        position: absolute;
        left: 15px; /* Adjusted for larger icons */
        top: 0;
        width: 2px;
        height: 100%;
        background-color: #d3d3d3; /* Light grey vertical line */
        z-index: -1;
    }

    /* Animation */
    .collapse.show .timeline-item {
        animation: fadeInUp 0.5s ease-in-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

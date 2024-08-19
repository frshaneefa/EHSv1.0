<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Ticket Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.tickets.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Ticket Details</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h5 class="card-title">Subject: {{ $ticket->subject }}</h5>
                                        <p class="card-text"><strong>Equipment:</strong> {{ $ticket->equipment }}</p>
                                        <p class="card-text"><strong>Quantity:</strong> {{ $ticket->quantity }}</p>
                                        <p class="card-text"><strong>Status:</strong> {{ ucfirst($ticket->status) }}</p>
                                        <p class="card-text"><strong>Part No./Serial No.:</strong> {{ $ticket->part_no }}</p>
                                        <p class="card-text"><strong>Remarks:</strong> {{ $ticket->remarks }}</p>
                                        <p class="card-text"><strong>Report Description:</strong> {{ $ticket->report_description }}</p>
                                        <p class="card-text"><strong>Service Details:</strong> {{ $ticket->service_details }}</p>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary">Back to Tickets</a>
                                        <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn btn-primary">Edit Ticket</a>
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

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
                                    <form>
                                        <div class="mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" class="form-control" id="subject" value="{{ $ticket->subject }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="equipment" class="form-label">Equipment</label>
                                            <input type="text" class="form-control" id="equipment" value="{{ $ticket->equipment }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity" value="{{ $ticket->quantity }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <input type="text" class="form-control" id="status" value="{{ ucfirst($ticket->status) }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="part_no" class="form-label">Part No./Serial No.</label>
                                            <input type="text" class="form-control" id="part_no" value="{{ $ticket->part_no }}" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="remarks" class="form-label">Remarks</label>
                                            <textarea class="form-control" id="remarks" rows="3" disabled>{{ $ticket->remarks }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="report_description" class="form-label">Report Description</label>
                                            <textarea class="form-control" id="report_description" rows="3" disabled>{{ $ticket->report_description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="service_details" class="form-label">Service Details</label>
                                            <textarea class="form-control" id="service_details" rows="3" disabled>{{ $ticket->service_details }}</textarea>
                                        </div>
                                        <!-- Attachments Section -->
                                        <div class="mb-3">
                                            <label for="attachment" class="form-label">Attachments</label>
                                            @if (is_array($ticket->attachments) && count($ticket->attachments) > 0)
                                                @foreach ($ticket->attachments as $attachment)
                                                    <div>
                                                        <a href="{{ asset('storage/' . $attachment) }}" target="_blank" class="btn btn-info">View Attachment {{ $loop->iteration }}</a>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>No attachments available.</p>
                                            @endif
                                        </div>
                                    </form>
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

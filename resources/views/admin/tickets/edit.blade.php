<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit Ticket</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.tickets.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit Ticket</li>
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
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('admin.tickets.update', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input type="text" name="subject" class="form-control" id="subject" value="{{ old('subject', $ticket->subject) }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="equipment">Equipment</label>
                                            <input type="text" name="equipment" class="form-control" id="equipment" value="{{ old('equipment', $ticket->equipment) }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" name="quantity" class="form-control" id="quantity" value="{{ old('quantity', $ticket->quantity) }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" id="status" required>
                                                <option value="submitted" {{ $ticket->status == 'submitted' ? 'selected' : '' }}>Submitted</option>
                                                <option value="verified" {{ $ticket->status == 'verified' ? 'selected' : '' }}>Verified</option>
                                                <option value="resolved" {{ $ticket->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                                <option value="closed" {{ $ticket->status == 'closed' ? 'selected' : '' }}>Closed</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="part_no">Part No./Serial No.</label>
                                            <input type="text" name="part_no" class="form-control" id="part_no" value="{{ old('part_no', $ticket->part_no) }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="remarks">Remarks</label>
                                            <textarea name="remarks" class="form-control" id="remarks" rows="3">{{ old('remarks', $ticket->remarks) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="report_description">Report Description</label>
                                            <textarea name="report_description" class="form-control" id="report_description" rows="3" required>{{ old('report_description', $ticket->report_description) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="service_details">Service Details</label>
                                            <textarea name="service_details" class="form-control" id="service_details" rows="3" required>{{ old('service_details', $ticket->service_details) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="attachments">Attachments</label>
                                            <input type="file" name="attachments[]" class="form-control-file" id="attachments" multiple>
                                        </div>

                                        <div class="form-group mt-4">
                                            <button type="submit" class="btn btn-primary">Update Ticket</button>
                                            <a href="{{ route('admin.tickets.index') }}" class="btn btn-secondary">Cancel</a>
                                        </div>
                                    </form>
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

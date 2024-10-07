<x-user-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Create Ticket</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Create Ticket</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">New Ticket Form</h3>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Please fill out this form to create a new ticket.</p>

                                    <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="subject" class="form-label">Subject</label>
                                                <input type="text" id="subject" name="subject" class="form-control" required>
                                                @error('subject')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="type" class="form-label">Type of Ticket</label>
                                                <select id="type" name="type" class="form-select" required>
                                                    <option value="">Select Type</option>
                                                    <option value="pm">Preventive Maintenance (PM)</option>
                                                    <option value="cm">Corrective Maintenance (CM)</option>
                                                    <option value="cr">Change Request (CR)</option>
                                                </select>
                                                @error('type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="severity" class="form-label">Severity</label>
                                                <select id="severity" name="severity" class="form-select" required>
                                                    <option value="">Select Severity</option>
                                                    <option value="critical">Critical</option>
                                                    <option value="significant">Significant</option>
                                                    <option value="moderate">Moderate</option>
                                                    <option value="minor">Minor</option>
                                                    <option value="low">Low</option>
                                                </select>
                                                @error('severity')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="equipment" class="form-label">Equipment</label>
                                                <input type="text" id="equipment" name="equipment" class="form-control" required>
                                                @error('equipment')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="quantity" class="form-label">Quantity</label>
                                                <input type="number" id="quantity" name="quantity" class="form-control" required>
                                                @error('quantity')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label for="part_no" class="form-label">Part No./Serial No.</label>
                                                <input type="text" id="part_no" name="part_no" class="form-control" required>
                                                @error('part_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="remarks" class="form-label">Remarks</label>
                                            <textarea id="remarks" name="remarks" class="form-control"></textarea>
                                            @error('remarks')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="report_description" class="form-label">Report Description</label>
                                            <textarea id="report_description" name="report_description" class="form-control" required></textarea>
                                            @error('report_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="service_details" class="form-label">Service Details</label>
                                            <textarea id="service_details" name="service_details" class="form-control" required></textarea>
                                            @error('service_details')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="attachments" class="form-label">Attachments</label>
                                            <input type="file" id="attachments" name="attachments[]" class="form-control" multiple>
                                            @error('attachments')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">
                                                Submit Ticket
                                            </button>
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
</x-user-layout>

<style>
    /* Form Input */
    .form-control {
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        height: 2.75rem;
    }

    /* Submit Button */
    .btn-primary {
        background-color: #4f46e5;
        color: #fff;
        border: none;
    }
    .btn-primary:hover {
        background-color: #4338ca;
    }

    /* Error message */
    .text-danger {
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    /* Form Select */
    .form-select {
        display: block;
        width: 100%;
        padding: 0.5rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #374151;
        background-color: #fff;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
    }
</style>

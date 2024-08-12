<x-admin-layout>
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
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">Please fill out this form to create a new ticket.</p>

                                    <form action="{{ route('admin.tickets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                        @csrf
                                        <div class="grid grid-cols-2 gap-6">
                                            <div class="mb-4">
                                                <label for="agensi_tid" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Agensi</label>
                                                <select name="agensi_tid" id="agensi_tid" class="form-select" required>
                                                    <option value="" disabled selected>Select Agensi</option>
                                                    @foreach($agensis as $agensi)
                                                        <option value="{{ $agensi->id }}">{{ $agensi->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('agensi_tid')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject</label>
                                                <input type="text" id="subject" name="subject" class="form-input" required>
                                                @error('subject')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-6">
                                            <div class="mb-4">
                                                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type of Ticket</label>
                                                <select id="type" name="type" class="form-select" required>
                                                    <option value="">Select Type</option>
                                                    <option value="pm">Preventive Maintenance (PM)</option>
                                                    <option value="cm">Corrective Maintenance (CM)</option>
                                                    <option value="cr">Change Request (CR)</option>
                                                </select>
                                                @error('type')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="severity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Severity</label>
                                                <select id="severity" name="severity" class="form-select" required>
                                                    <option value="">Select Severity</option>
                                                    <option value="critical">Critical</option>
                                                    <option value="significant">Significant</option>
                                                    <option value="moderate">Moderate</option>
                                                    <option value="minor">Minor</option>
                                                    <option value="low">Low</option>
                                                </select>
                                                @error('severity')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-6">
                                            <div class="mb-4">
                                                <label for="equipment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Equipment</label>
                                                <input type="text" id="equipment" name="equipment" class="form-input" required>
                                                @error('equipment')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity</label>
                                                <input type="number" id="quantity" name="quantity" class="form-input" required>
                                                @error('quantity')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="part_no" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Part No./Serial No.</label>
                                            <input type="text" id="part_no" name="part_no" class="form-input" required>
                                            @error('part_no')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="remarks" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Remarks</label>
                                            <textarea id="remarks" name="remarks" class="form-input"></textarea>
                                            @error('remarks')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="report_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Report Description</label>
                                            <textarea id="report_description" name="report_description" class="form-input" required></textarea>
                                            @error('report_description')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="service_details" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service Details</label>
                                            <textarea id="service_details" name="service_details" class="form-input" required></textarea>
                                            @error('service_details')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="attachments" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Attachments</label>
                                            <input type="file" id="attachments" name="attachments[]" class="form-input" multiple>
                                            @error('attachments')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="submit-button">
                                                Submit Ticket
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <h5 class="card-title">Featured</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h5 class="m-0">Featured</h5>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">Special title treatment</h6>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>

                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0">Featured</h5>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">Special title treatment</h6>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
            
        </div>
    </div>
</x-admin-layout>

<style>
    /* Form Input */
    .form-input {
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

    /* Submit Button */
    .submit-button {
        background-color: #4f46e5;
        color: #fff;
        border: none;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        border-radius: 0.375rem;
        cursor: pointer;
    }
    .submit-button:hover {
        background-color: #4338ca;
    }
</style>

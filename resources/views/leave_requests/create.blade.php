<x-user-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Create Leave Request</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('leave-requests.index') }}">Leave Requests</a></li>
                                <li class="breadcrumb-item active">Create</li>
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
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                    <form action="{{ route('leave-requests.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-4">
                                                <label for="type" class="form-label">Leave Type</label>
                                                <select id="type" name="leave_type" class="form-select" required>
                                                    <option value="" disabled selected>Select Leave Type</option>
                                                    <option value="annual">Annual Leave</option>
                                                    <option value="emergency">Emergency Leave</option>
                                                    <option value="medical">Medical Leave</option>
                                                </select>

                                                @error('type')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="start_date" class="form-label">Start Date</label>
                                                <input type="date" id="start_date" name="start_date" class="form-control" required>
                                                @error('start_date')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="end_date" class="form-label">End Date</label>
                                                <input type="date" id="end_date" name="end_date" class="form-control" required>
                                                @error('end_date')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="reason" class="form-label">Reason</label>
                                                <textarea id="reason" name="reason" class="form-control" rows="4" required></textarea>
                                                @error('reason')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="attachment">Attachment (Proof of Leave):</label>
                                                <input type="file" name="attachment" id="attachment" class="form-control">
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit Request</button>
                                            <a href="{{ route('leave-requests.index') }}" class="btn btn-secondary">Cancel</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
</x-user-layout>

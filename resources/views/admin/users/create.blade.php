<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Register New User</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Register New User</li>
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
                                        <p class="card-text">Please fill out this form to create a new user.</p>

                                        <!-- Dropdown for Register New User -->
                                        <div>
                                        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-6">
                                            @csrf
                                            <div class="grid grid-cols-2 gap-6">
                                                <div class="mb-4">
                                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                                                    <input type="text" name="name" id="name" class="form-input" required autofocus>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="agensi_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Agensi</label>
                                                    <select name="agensi_id" id="agensi_id" class="form-select" required>
                                                        <option value="" disabled selected>Select Agensi</option>
                                                        @foreach($agensis as $agensi)
                                                            <option value="{{ $agensi->id }}">{{ $agensi->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                                <input type="email" name="email" id="email" class="form-input" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                                                <input type="password" name="password" id="password" class="form-input" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
                                                <input type="tel" name="phone" id="phone" class="form-input" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Address</label>
                                                <input type="text" name="address" id="address" class="form-input" required>
                                            </div>
                                            <button type="submit" class="submit-button">Submit</button>
                                        </form>

                                        </div>
                                        
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
                                </div>
                            </div> -->
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
        color: #374151; /* Gray 700 */
        background-color: #F3F4F6; /* Gray 100 */
        border: 1px solid #D1D5DB; /* Gray 300 */
        border-radius: 0.375rem; /* Rounded-md */
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-input:focus {
        outline: 0;
        border-color: #6366F1; /* Indigo 600 */
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1); /* Indigo 600 shadow */
    }

    /* Form Select */
    .form-select {
        display: block;
        width: 100%;
        padding: 0.5rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #374151; /* Gray 700 */
        background-color: #F3F4F6; /* Gray 100 */
        border: 1px solid #D1D5DB; /* Gray 300 */
        border-radius: 0.375rem; /* Rounded-md */
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .submit-button {
        display: inline-block;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.25rem;
        font-weight: 600;
        color: #fff;
        background-color: #6366F1; /* Indigo color */
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-decoration: none; /* Remove underline for anchor elements */
    }

    .submit-button:hover {
        background-color: #4F46E5; /* Darker shade of indigo on hover */
    }
</style>

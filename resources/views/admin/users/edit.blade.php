<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Edit User</li>
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

                                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT') <!-- Change PATCH to PUT -->

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', $user->phone) }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea name="address" class="form-control" id="address" rows="3" required>{{ old('address', $user->address) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="usertype">User Type</label>
                                            <select name="usertype" class="form-control" id="usertype" required>
                                                <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="staff" {{ $user->usertype == 'staff' ? 'selected' : '' }}>Staff</option>
                                                <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="agensi_id">Agensi</label>
                                            <select name="agensi_id" class="form-control" id="agensi_id" required>
                                                @foreach($agensis as $agency)
                                                    <option value="{{ $agency->id }}" {{ $user->agensi_id == $agency->id ? 'selected' : '' }}>
                                                        {{ $agency->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password (leave blank if not changing)</label>
                                            <input type="password" name="password" class="form-control" id="password">
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                        </div>

                                        <div class="form-group mt-4">
                                            <button type="submit" class="btn btn-primary">Update User</button>
                                            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
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

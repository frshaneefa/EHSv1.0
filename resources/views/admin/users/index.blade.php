<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">User Management</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">All Users</li>
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
                                                            <form action="{{ route('admin.users.index') }}" method="GET" style="display: flex; gap: 0.3rem;">
                                                                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                                                                <input type="text" name="search" class="form-control" placeholder="Search by Name, Email, or Agensi ID" value="{{ request('search') }}">
                                                                <button type="submit" class="btn btn-primary">Search</button>
                                                            </form>
                                                            <form action="{{ route('admin.users.index') }}" method="GET">
                                                                <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                                                                <button type="submit" class="btn btn-secondary">Undo Search</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Name</th>
                                                                <th>Phone</th>
                                                                <th>Email</th>
                                                                <th>Address</th>
                                                                <th>Agensi</th> <!-- Updated column header -->
                                                                <th>Last Login</th> <!-- New column header -->
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($users as $index => $user)
                                                                <tr>
                                                                    <td>{{ $index + 1 + (($users->currentPage() - 1) * $users->perPage()) }}</td>
                                                                    <td>{{ $user->name }}</td>
                                                                    <td>{{ $user->phone }}</td>
                                                                    <td>{{ $user->email }}</td>
                                                                    <td>{{ $user->address }}</td>
                                                                    <td>{{ $user->agensi->name ?? 'N/A' }}</td>
                                                                    <td>{{ $user->last_login_at ? $user->last_login_at->format('Y-m-d H:i:s') : 'Never' }}</td> <!-- Display last login -->
                                                                    <td>
                                                                        <div style="display: flex; gap: 0.5rem;">
                                                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-info btn-sm">
                                                                                Edit
                                                                            </a>
                                                                            <!-- Delete User -->
                                                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                                    Delete
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>
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

</x-admin-layout>

{{ $users->withQueryString()->links() }}

<script>
    document.getElementById('entriesPerPage').addEventListener('change', function() {
        let perPage = this.value;
        let url = new URL(window.location.href);
        url.searchParams.set('per_page', perPage);
        window.location.href = url.toString();
    });
</script>


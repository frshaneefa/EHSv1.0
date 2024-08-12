<x-user-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Ticket Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('tickets.index') }}">Home</a></li>
                                <li class="breadcrumb-item active">Ticket #{{ $ticket->id }}</li>
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
                                            <!-- Ticket Details -->
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Ticket ID:</strong></td>
                                                        <td>#{{ $ticket->id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Type:</strong></td>
                                                        <td>{{ $ticket->type }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Severity:</strong></td>
                                                        <td>{{ $ticket->severity }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Title:</strong></td>
                                                        <td>{{ $ticket->subject }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Status:</strong></td>
                                                        <td>
                                                            @if ($ticket->status === 'submitted')
                                                                <span class="status-box status-submitted">Submitted</span>
                                                            @elseif ($ticket->status === 'verified')
                                                                <span class="status-box status-verified">Verified</span>
                                                            @elseif ($ticket->status === 'resolved')
                                                                <span class="status-box status-resolved">Resolved</span>
                                                            @elseif ($ticket->status === 'closed')
                                                                <span class="status-box status-closed">Closed</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date:</strong></td>
                                                        <td>{{ $ticket->created_at->setTimezone('Asia/Kuala_Lumpur')->format('d/m/y H:i') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Description:</strong></td>
                                                        <td>{{ $ticket->description }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Remarks:</strong></td>
                                                        <td>{{ $ticket->remarks }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Attachments:</strong></td>
                                                        <td>
                                                            @if ($ticket->attachments)
                                                                @foreach (json_decode($ticket->attachments) as $attachment)
                                                                    <a href="{{ asset('storage/' . $attachment) }}">{{ $attachment }}</a><br>
                                                                @endforeach
                                                            @else
                                                                No attachments
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                             <!-- Back Button -->
                                             <div class="text-center mt-4">
                                                <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Back</a>
                                            </div>
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
</x-user-layout>

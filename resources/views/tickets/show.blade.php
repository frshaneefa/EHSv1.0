<x-user-layout>
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <!-- Ticket Details Card -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ticket Information</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <!-- Ticket ID -->
                                <div class="form-group">
                                    <label for="ticket-id">Ticket ID</label>
                                    <input type="text" id="ticket-id" class="form-control" value="#{{ $ticket->id }}" disabled>
                                </div>

                                <!-- Type -->
                                <div class="form-group">
                                    <label for="ticket-type">Type</label>
                                    <input type="text" id="ticket-type" class="form-control" value="{{ $ticket->type }}" disabled>
                                </div>

                                <!-- Severity -->
                                <div class="form-group">
                                    <label for="ticket-severity">Severity</label>
                                    <input type="text" id="ticket-severity" class="form-control" value="{{ $ticket->severity }}" disabled>
                                </div>

                                <!-- Title -->
                                <div class="form-group">
                                    <label for="ticket-title">Title</label>
                                    <input type="text" id="ticket-title" class="form-control" value="{{ $ticket->subject }}" disabled>
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label for="ticket-status">Status</label>
                                    <input type="text" id="ticket-status" class="form-control" 
                                           value="@if ($ticket->status === 'submitted') Submitted @elseif ($ticket->status === 'verified') Verified @elseif ($ticket->status === 'resolved') Resolved @elseif ($ticket->status === 'closed') Closed @endif" 
                                           disabled>
                                </div>

                                <!-- Date & Time -->
                                <div class="form-group">
                                    <label for="ticket-date">Date</label>
                                    <input type="text" id="ticket-date" class="form-control" 
                                           value="{{ $ticket->created_at->setTimezone('Asia/Kuala_Lumpur')->format('d/m/y') }}" 
                                           disabled>
                                </div>
                                <div class="form-group">
                                    <label for="ticket-time">Time</label>
                                    <input type="text" id="ticket-time" class="form-control" 
                                           value="{{ $ticket->created_at->setTimezone('Asia/Kuala_Lumpur')->format('H:i') }}" 
                                           disabled>
                                </div>

                                <!-- Description -->
                                <div class="form-group">
                                    <label for="ticket-description">Description</label>
                                    <textarea id="ticket-description" class="form-control" rows="3" disabled>{{ $ticket->report_description }}</textarea>
                                </div>

                                <!-- Remarks -->
                                <div class="form-group">
                                    <label for="ticket-remarks">Remarks</label>
                                    <textarea id="ticket-remarks" class="form-control" rows="3" disabled>{{ $ticket->remarks }}</textarea>
                                </div>

                                <!-- Attachments -->
                                <div class="form-group">
                                    <label for="ticket-attachments">Attachments</label>
                                    <div>
                                        @if ($ticket->attachments)
                                            @foreach (json_decode($ticket->attachments) as $attachment)
                                                <a href="{{ asset('storage/' . $attachment) }}">{{ $attachment }}</a><br>
                                            @endforeach
                                        @else
                                            No attachments
                                        @endif
                                    </div>
                                </div>
                            </form>

                            <!-- Back Button -->
                            <div class="text-center mt-4">
                                <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline Card -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ticket Timeline</h3>
                        </div>
                        <div class="card-body">
                            <!-- Timeline -->
                            <div class="timeline">
                                <!-- Timeline Item: Ticket Submitted -->
                                <div class="timeline-item">
                                    <div class="timeline-icon bg-primary">
                                        <i class="fas fa-paper-plane"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <span class="time"><i class="far fa-clock"></i> {{  $ticket->created_at ? $ticket->created_at->format('d/m/Y H:i') : 'N/A'  }}</span>
                                        <h3 class="timeline-header">Ticket Submitted</h3>
                                        <div class="timeline-body">
                                            The ticket was submitted with severity: <strong>{{ $ticket->severity }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <!-- Timeline Item: Status Changes -->
                                
                                <div class="timeline-item">
                                    <div class="timeline-icon bg-warning">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <span class="time"><i class="far fa-clock"></i> {{ $ticket->verified_at ?  $ticket->verified_at->format('d/m/Y H:i') : 'N/A'  }}</span>
                                        <h3 class="timeline-header">Ticket Verified</h3>
                                        <div class="timeline-body">
                                            The ticket was verified by support.
                                        </div>
                                    </div>
                                </div>
                               

                                <div class="timeline-item">
                                    <div class="timeline-icon bg-success">
                                        <i class="fas fa-tools"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <span class="time"><i class="far fa-clock"></i> {{ $ticket->resolved_at ?  $ticket->resolved_at->format('d/m/Y H:i') : 'N/A'  }}</span>
                                        <h3 class="timeline-header">Ticket Resolved</h3>
                                        <div class="timeline-body">
                                            The ticket has been resolved successfully.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="timeline-item">
                                    <div class="timeline-icon bg-secondary">
                                        <i class="fas fa-times-circle"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <span class="time"><i class="far fa-clock"></i> {{  $ticket->closed_at ? $ticket->closed_at->format('d/m/Y H:i') : 'N/A'  }}</span>
                                        <h3 class="timeline-header">Ticket Closed</h3>
                                        <div class="timeline-body">
                                            The ticket has been closed.
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-user-layout>

<style>
/* Timeline Styles */
.timeline {
    position: relative;
    padding: 0;
    margin: 20px 0;
    list-style: none;
}

.timeline:before {
    content: '';
    position: absolute;
    left: 40px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #ddd;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
    padding-left: 60px;
}

.timeline-item .timeline-icon {
    position: absolute;
    left: 0;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #999;
    color: #fff;
    text-align: center;
    line-height: 40px;
}

.timeline-item .timeline-content {
    background: #f8f9fa;
    padding: 10px;
    border-radius: 4px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.timeline-item .timeline-header {
    margin: 0;
    font-weight: bold;
    font-size: 16px;
    color: #333;
}

.timeline-item .timeline-body {
    margin-top: 5px;
    font-size: 14px;
    color: #666;
}

.timeline-item .time {
    display: block;
    font-size: 12px;
    color: #999;
    margin-bottom: 5px;
}

/* Color variations for different statuses */
.timeline-item .bg-primary {
    background-color: #007bff;
}

.timeline-item .bg-warning {
    background-color: #ffc107;
}

.timeline-item .bg-success {
    background-color: #28a745;
}

.timeline-item .bg-danger {
    background-color: #dc3545;
}
</style>

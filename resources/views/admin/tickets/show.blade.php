<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            SUBJECT : {{ $ticket->subject }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Notification -->
            @if(Session::has('success'))
                <div class="notification success">
                    {{ Session::get('success') }}
                    <button class="close-button">&times;</button>
                </div>
            @endif

            <!-- Error Notification -->
            @if(Session::has('error'))
                <div class="notification error">
                    {{ Session::get('error') }}
                    <button class="close-button">&times;</button>
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-white-800 border-b border-gray-200 dark:border-gray-700">
                    <div class="mb-4">
                        <p>Status: 
                            @if ($ticket->status === 'submitted')
                                <span class="status-box status-submitted">Submitted</span>
                            @elseif ($ticket->status === 'verified')
                                <span class="status-box status-verified">Verified</span>
                            @elseif ($ticket->status === 'resolved')
                                <span class="status-box status-resolved">Resolved</span>
                            @elseif ($ticket->status === 'closed')
                                <span class="status-box status-closed">Closed</span>
                            @else
                                <span class="status-box">{{ ucfirst($ticket->status) }}</span>
                            @endif
                        </p>
                    </div>

                    <table class="mb-4">
                        <tbody>
                            <!-- First Row -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700 text-center"><strong>Equipment</strong></td>
                                <td class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700 text-center"><strong>Quantity</strong></td>
                                <td class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700 text-center"><strong>Part No./Serial No.</strong></td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700 text-center">{{ $ticket->equipment }}</td>
                                <td class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700 text-center">{{ $ticket->quantity }}</td>
                                <td class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700 text-center">{{ $ticket->part_no }}</td>
                            </tr>
                            <!-- Second Row -->
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700 text-center"><strong>Remarks</strong></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700">{{ $ticket->remarks }}</td>
                            </tr>
                            <!-- Third Row -->
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700 text-center"><strong>Report Description</strong></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700">{{ $ticket->report_description }}</td>
                            </tr>
                            <!-- Fourth Row -->
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700 text-center"><strong>Service Details:</strong></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700">{{ $ticket->service_details }}</td>
                            </tr>
                            <!-- Fifth Row -->
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700 text-center">
                                    <strong>Attachments</strong>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap border border-gray-300 dark:border-gray-700">
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

                    <div class="text-center">
                        <!-- Back Ticket Button -->
                        <button type="back" class="back-button">
                            <a href="{{ route('admin.tickets.index') }}">
                                Back
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


    <style>
        /* Table part */
        table {
            width: 100%;
            border-collapse: collapse;
            border-width: 4px; /* Adjust the thickness of the border */
        }

        td, th {
            border: 2px solid #ccc; /* Border for each cell */
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .dark td, .dark th {
            border-color: rgba(255, 255, 255, 0.1);
        }

        .dark tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Status Part */
        .status-box {
            display: inline-block;
            padding: 0.25em 0.5em;
            border-radius: 4px;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-submitted {
            background-color: green;
        }
        .status-verified {
            background-color: yellow;
            color: black;
        }
        .status-resolved {
            background-color: red;
        }
        .status-closed {
            background-color: grey;
        }

        /* Submit Ticket Button */
        .back-button {
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

        .back-button:hover {
            background-color: #4F46E5; /* Darker shade of indigo on hover */
        }
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            z-index: 9999;
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .notification.success {
            background-color: #4CAF50;
            color: #fff;
        }

        .notification.error {
            background-color: #f44336;
            color: #fff;
        }
    </style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
            const notifications = document.querySelectorAll('.notification');

            notifications.forEach(notification => {
                const closeButton = notification.querySelector('.close-button');
                const autoDismissTimeout = 4000; // 4 seconds

                closeButton.addEventListener('click', function () {
                    notification.style.display = 'none';
                });

                setTimeout(function () {
                    notification.style.display = 'none';
                }, autoDismissTimeout);
            });
        });
</script>


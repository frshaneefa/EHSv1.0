<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('MY TICKETS') }}
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

                    <!-- Search and Filters Form -->
                    <form action="{{ route('admin.tickets.index') }}" method="GET" class="mb-6">
                        <div class="flex flex-wrap -mx-2 mb-4">
                            <div class="px-2 w-1/4">
                                <input type="text" name="search_ticket_id" value="{{ request('search_ticket_id') }}" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="Ticket ID">
                            </div>
                            <div class="px-2 w-1/2">
                                <input type="text" name="search_title" value="{{ request('search_title') }}" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" placeholder="Title">
                            </div>
                            <div class="px-2 w-1/4">
                                <input type="date" name="search_date" value="{{ request('search_date') }}" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                            </div>
                            <div class="px-2 w-1/4">
                                <select name="search_type" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                                    <option value="">All Types</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type }}" {{ request('search_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="px-2 w-1/4">
                                <select name="search_severity" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                                    <option value="">All Severities</option>
                                    @foreach ($severities as $severity)
                                        <option value="{{ $severity }}" {{ request('search_severity') == $severity ? 'selected' : '' }}>{{ $severity }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="px-2 w-1/4">
                                <select name="search_status" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                                    <option value="">All Statuses</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status }}" {{ request('search_status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-2">
                            <div class="px-2 w-1/4 flex items-center">
                                <button type="submit" class="submit-button">Apply Filters</button>
                                <a href="{{ route('admin.tickets.index') }}" class="reset-button">Reset</a>
                                <button type="button" id="print-button" class="print-button">Print PDF</button>
                                
                            </div>
                            </div>
                    </form>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-left">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider text-center">
                                        <input type="checkbox" id="select-all" onclick="toggleSelectAll()">
                                    </th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider text-center">Ticket ID</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider text-center">Type</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider text-center">Severity</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider text-center">Status</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider text-center">Title</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider text-center">Date</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <input type="checkbox" class="ticket-checkbox" value="{{ $ticket->id }}">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">#{{ $ticket->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $ticket->type }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $ticket->severity }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
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
                                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $ticket->subject }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">{{ $ticket->created_at->setTimezone('Asia/Kuala_Lumpur')->format('d/m/y H:i') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex justify-center space-x-2">
                                                <a href="{{ route('admin.tickets.show', $ticket->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" x="0px" y="0px" width="24" height="24" viewBox="0 0 25 25">
                                                        <path fill="currentColor" d="M14,2H6C4.9,2,4,2.9,4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V8L14,2z M18.5,9H13V3.5L18.5,9z"></path>
                                                    </svg>
                                                </a>

                                                <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" x="0px" y="0px" width="24" height="24" viewBox="0 0 30 30">
                                                        <path fill="currentColor" d="M 22.828125 3 C 22.316375 3 21.804562 3.1954375 21.414062 3.5859375 L 19 6 L 24 11 L 26.414062 8.5859375 C 27.195062 7.8049375 27.195062 6.5388125 26.414062 5.7578125 L 24.242188 3.5859375 C 23.851688 3.1954375 23.339875 3 22.828125 3 z M 17 8 L 5.2597656 19.740234 C 5.2597656 19.740234 6.1774219 20.111703 7.7402344 20.603516 C 8.2964219 20.787703 8.9708125 21 9.6894531 21 C 11.275453 21 13 20.5 13 20.5 L 25 8.5 L 20 3.5 L 17 6.5 z M 4.5 21.050781 C 3.3357165 21.050781 2.3507695 21.764985 2.0839844 22.851562 L 1.0800781 27.269531 A 1.0001 1.0001 0 0 0 1.3613281 28.478516 A 1.0001 1.0001 0 0 0 2.0703125 28.714844 L 6.4882812 27.710938 C 7.5752768 27.444288 8.2900391 26.460327 8.2900391 25.296875 C 8.2900391 24.583975 8.0592032 23.916421 7.7070312 23.373047 C 6.9220312 22.215047 5.5648125 21.050781 4.5 21.050781 z"></path>
                                                    </svg>
                                                </a>

                                                <form method="POST" action="{{ route('admin.tickets.destroy', $ticket->id) }}" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" x="0px" y="0px" width="24" height="24" viewBox="0 0 30 30">
                                                            <path fill="currentColor" d="M 12 4 C 11.448 4 11 4.448 11 5 L 11 6 L 5 6 C 4.448 6 4 6.448 4 7 C 4 7.552 4.448 8 5 8 L 6 8 L 6 24 C 6 25.104 6.896 26 8 26 L 22 26 C 23.104 26 24 25.104 24 24 L 24 8 L 25 8 C 25.552 8 26 7.552 26 7 C 26 6.448 25.552 6 25 6 L 19 6 L 19 5 C 19 4.448 18.552 4 18 4 L 12 4 z M 8 10 L 10 10 L 10 22 L 8 22 L 8 10 z M 14 10 L 16 10 L 16 22 L 14 22 L 14 10 z M 20 10 L 22 10 L 22 22 L 20 22 L 20 10 z"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $tickets->appends(request()->except('page'))->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


    <!-- CSS styles -->
    <style>
        .overflow-x-auto {
            overflow-x: auto;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid transparent;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: transparent;
        }

        tr:nth-child(even) {
            background-color: transparent;
        }

        .dark th, .dark td {
            border-color: rgba(255, 255, 255, 0.05);
        }

        .dark th {
            background-color: rgba(255, 255, 255, 0.03);
        }

        .dark tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.03);
        }
        /* style for icon */
        .icon {
            fill: #ffffff;
            transition: fill 0.3s; /* Smooth transition for hover effect */
        }

        /* Hover effect */
        .icon:hover {
            fill: #8B5CF6; /* Change fill color on hover */
        }
        .space-x-2 > * + * {
            margin-left: 0.5rem; /* Adjust space between icons */
        }
        /* Status Color */
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
            color: black; /* Optional: if yellow background, better to use black text for better readability */
        }
        .status-resolved {
            background-color: red;
        }
        .status-closed {
            background-color: grey;
        }
    
        .submit-button, .reset-button, .print-button {
            display: inline-block;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            font-weight: 600;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none; /* Remove underline for anchor elements */
            margin-left: 0.5rem; /* Space between buttons */
        }

        .submit-button {
            background-color: #6366F1; /* Indigo color */
        }

        .submit-button:hover {
            background-color: #4F46E5; /* Darker shade of indigo on hover */
        }

        .reset-button {
            background-color: #6B7280; /* Grey color */
        }

        .reset-button:hover {
            background-color: #4B5563; /* Darker shade of grey on hover */
        }

        .print-button {
            background-color: #10B981; /* Green color */
        }

        .print-button:hover {
            background-color: #059669; /* Darker shade of green on hover */
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
        document.getElementById('print-button').addEventListener('click', function(event) {
            event.preventDefault();
            const checkboxes = document.querySelectorAll('.ticket-checkbox:checked');
            const ticketIds = Array.from(checkboxes).map(checkbox => checkbox.value);
            if (ticketIds.length > 0) {
                const queryParams = new URLSearchParams({ ticket_ids: ticketIds.join(',') });
                window.location.href = `{{ route('tickets.print') }}?${queryParams.toString()}`;
            } else {
                alert('Please select at least one ticket to print.');
            }
        });

        function toggleSelectAll() {
            const selectAllCheckbox = document.getElementById('select-all');
            const checkboxes = document.querySelectorAll('.ticket-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        }

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

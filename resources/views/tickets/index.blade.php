<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('MY TICKETS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <!-- Search and Filters Form -->
                    <form action="{{ route('tickets.index') }}" method="GET" class="mb-6">
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
                                <a href="{{ route('tickets.index') }}" class="reset-button">Reset</a>
                                <button type="button" id="print-button" class="print-button">Print Selected Tickets</button>
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
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider text-center">Title</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider text-center">Status</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider text-center">Date</th>
                                    <th class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($tickets as $ticket)
                                    @if($ticket->user_id === auth()->id())
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <input type="checkbox" class="ticket-checkbox" value="{{ $ticket->id }}">
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">#{{ $ticket->id }}</td> <!-- Display the ticket ID -->
                                            <td>{{ $ticket->type }}</td>
                                            <td>{{ $ticket->severity }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">{{ $ticket->subject }}</td>
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
                                            <td class="px-6 py-4 whitespace-nowrap text-center">{{ $ticket->created_at->setTimezone('Asia/Kuala_Lumpur')->format('d/m/y H:i') }}</td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex justify-center space-x-2">
                                                    <a href="{{ route('tickets.show', $ticket->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg"  class="icon" x="0px" y="0px" width="24" height="24" viewBox="0 0 25 25">
                                                            <path fill="currentColor" d="M14,2H6C4.9,2,4,2.9,4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V8L14,2z M18.5,9H13V3.5L18.5,9z"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
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
    </script>

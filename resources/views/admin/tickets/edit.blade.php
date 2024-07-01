<x-app-layout>
<x-slot name="header">
    <div class="flex items-center justify-center">
        <!-- Heading -->
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            EDIT TICKET
        </h2>
    </div>
</x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-lg font-semibold mb-4 text-center">Please update in this form. Thank You.</h1>
                    <form action="{{ route('admin.tickets.update', $ticket->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject</label>
                            <input type="text" id="subject" name="subject" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('subject', $ticket->subject) }}" required>
                            @error('subject')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="mb-4">
                                <label for="equipment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Equipment</label>
                                <input type="text" id="equipment" name="equipment" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('equipment', $ticket->equipment) }}" required>
                                @error('equipment')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity</label>
                                <input type="number" id="quantity" name="quantity" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('quantity', $ticket->quantity) }}" required>
                                @error('quantity')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                            <select id="status" name="status" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                                <option value="submitted" {{ old('status', $ticket->status) === 'submitted' ? 'selected' : '' }}>Submitted</option>
                                <option value="verified" {{ old('status', $ticket->status) === 'verified' ? 'selected' : '' }}>Verified</option>
                                <option value="resolved" {{ old('status', $ticket->status) === 'resolved' ? 'selected' : '' }}>Resolved</option>
                                <option value="closed" {{ old('status', $ticket->status) === 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                            @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-4">
                            <label for="part_no" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Part No./Serial No.</label>
                            <input type="text" id="part_no" name="part_no" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('part_no', $ticket->part_no) }}" required>
                            @error('part_no')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="remarks" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Remarks</label>
                            <textarea id="remarks" name="remarks" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('remarks', $ticket->remarks) }}</textarea>
                            @error('remarks')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="report_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Report Description</label>
                            <textarea id="report_description" name="report_description" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('report_description', $ticket->report_description) }}</textarea>
                            @error('report_description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="service_details" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service Details</label>
                            <textarea id="service_details" name="service_details" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>{{ old('service_details', $ticket->service_details) }}</textarea>
                            @error('service_details')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="attachments" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Attachments</label>
                            <input type="file" id="attachments" name="attachments[]" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" multiple>
                            @error('attachments')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <!-- Update Ticket Button -->
                            <button type="submit" class="update-button">
                                Update Ticket
                            </button>

                            <!-- Cancel Button -->
                            <a href="{{ route('admin.tickets.index') }}" class="cancel-button">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    /* Update Ticket Button */
    .update-button {
        display: inline-block;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.25rem;
        font-weight: 600;
        color: #fff;
        background-color: #34D399; /* Green color */
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-decoration: none; /* Remove underline for anchor elements */
    }

    .update-button:hover {
        background-color: #10B981; /* Darker shade of green on hover */
    }

    /* Cancel Button */
    .cancel-button {
        display: inline-block;
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.25rem;
        font-weight: 600;
        color: #fff;
        background-color: #EF4444; /* Red color */
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-decoration: none; /* Remove underline for anchor elements */
    }

    .cancel-button:hover {
        background-color: #DC2626; /* Darker shade of red on hover */
    }
</style>
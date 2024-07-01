<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('CREATE TICKET') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-lg font-semibold mb-4">Please fill out this form. Thank you.</h1>
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
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div>
                            <!-- Include hidden field for agensi -->
                            <input type="hidden" name="agensi_id" value="{{ auth()->user()->agensi_id }}">
                            
                            <div class="mb-4">
                                <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject</label>
                                <input type="text" id="subject" name="subject" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                                @error('subject')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="mb-4">
                                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type of Ticket</label>
                                    <select id="type" name="type" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                                        <option value="">Select Type</option>
                                        <option value="pm">Preventive Maintenance (PM)</option>
                                        <option value="cm">Corrective Maintenance (CM)</option>
                                        <option value="cr">Change Request (CR)</option>
                                    </select>
                                    @error('type')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="severity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Severity</label>
                                    <select id="severity" name="severity" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                                        <option value="">Select Severity</option>
                                        <option value="critical">Critical</option>
                                        <option value="significant">Significant</option>
                                        <option value="moderate">Moderate</option>
                                        <option value="minor">Minor</option>
                                        <option value="low">Low</option>
                                    </select>
                                    @error('severity')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="mb-4">
                                    <label for="equipment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Equipment</label>
                                    <input type="text" id="equipment" name="equipment" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @error('equipment')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity</label>
                                    <input type="number" id="quantity" name="quantity" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                                    @error('quantity')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="part_no" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Part No./Serial No.</label>
                                <input type="text" id="part_no" name="part_no" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                                @error('part_no')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="remarks" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Remarks</label>
                                <textarea id="remarks" name="remarks" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                                @error('remarks')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="report_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Report Description</label>
                                <textarea id="report_description" name="report_description" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required></textarea>
                                @error('report_description')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="service_details" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service Details</label>
                                <textarea id="service_details" name="service_details" class="mt-1 p-2 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required></textarea>
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
                        </div>
                        <div class="text-center">
                            <!-- Submit Ticket Button -->
                            <button type="submit" class="submit-button">
                                Submit Ticket
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    /* Submit Ticket Button */
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




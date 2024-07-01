<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <!-- Dropdown for Register New User -->
                <div x-data="{ open: false }" class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center">
                        <img src="{{ asset('images/user.png') }}" alt="Enetech Logo Image" class="mb-4">
                        <h1 class="text-lg font-semibold cursor-pointer mb-4" @click="open = !open">
                           <a class="text-white">..</a>REGISTER NEW USER
                        </h1>
                    </div>
                    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
                        <h2 class="text-lg mb-4">**Please fill out this form.</h2>
                        <form method="POST" action="{{ route('admin.dashboard.store') }}" class="space-y-6">
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
                            <button type="submit" class="submit-button">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center">
                        <img src="{{ asset('images/multiuser.png') }}" alt="Enetech Logo Image" class="mb-4">
                        <h1 class="text-lg font-semibold mb-4"><a class="text-white">..</a>USER MANAGEMENT</h1>
                    </div>  
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Agensi ID</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">{{ $user->agensi_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" x="0px" y="0px" width="24" height="24" viewBox="0 0 30 30">
                                                    <path fill="currentColor" d="M 22.828125 3 C 22.316375 3 21.804562 3.1954375 21.414062 3.5859375 L 19 6 L 24 11 L 26.414062 8.5859375 C 27.195062 7.8049375 27.195062 6.5388125 26.414062 5.7578125 L 24.242188 3.5859375 C 23.851688 3.1954375 23.339875 3 22.828125 3 z M 17 8 L 5.2597656 19.740234 C 5.2597656 19.740234 6.1775313 19.658 6.5195312 20 C 6.8615312 20.342 6.58 22.58 7 23 C 7.42 23.42 9.6438906 23.124359 9.9628906 23.443359 C 10.281891 23.762359 10.259766 24.740234 10.259766 24.740234 L 22 13 L 17 8 z M 4 23 L 3.0566406 25.671875 A 1 1 0 0 0 3 26 A 1 1 0 0 0 4 27 A 1 1 0 0 0 4.328125 26.943359 A 1 1 0 0 0 4.3378906 26.939453 L 4.3632812 26.931641 A 1 1 0 0 0 4.3691406 26.927734 L 7 26 L 5.5 24.5 L 4 23 z"></path>
                                                </svg>
                                            </a>
                                            <!-- Delete Ticket -->
                                            <form action="{{ route('admin.dashboard.destroy', $user->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" x="0px" y="0px" width="24" height="24" viewBox="0 0 48 48">
                                                        <path fill="red" d="M 24 4 C 20.491685 4 17.570396 6.6214322 17.080078 10 L 10.238281 10 A 1.50015 1.50015 0 0 0 9.9804688 9.9785156 A 1.50015 1.50015 0 0 0 9.7578125 10 L 6.5 10 A 1.50015 1.50015 0 1 0 6.5 13 L 8.6386719 13 L 11.15625 39.029297 C 11.427329 41.835926 13.811782 44 16.630859 44 L 31.367188 44 C 34.186411 44 36.570826 41.836168 36.841797 39.029297 L 39.361328 13 L 41.5 13 A 1.50015 1.50015 0 1 0 41.5 10 L 38.244141 10 A 1.50015 1.50015 0 0 0 37.763672 10 L 30.919922 10 C 30.429604 6.6214322 27.508315 4 24 4 z M 24 7 C 25.879156 7 27.420767 8.2681608 27.861328 10 L 20.138672 10 C 20.579233 8.2681608 22.120844 7 24 7 z M 11.650391 13 L 36.347656 13 L 33.855469 38.740234 C 33.730439 40.035363 32.667963 41 31.367188 41 L 16.630859 41 C 15.331937 41 14.267499 40.033606 14.142578 38.740234 L 11.650391 13 z M 20.476562 17.978516 A 1.50015 1.50015 0 0 0 19 19.5 L 19 34.5 A 1.50015 1.50015 0 1 0 22 34.5 L 22 19.5 A 1.50015 1.50015 0 0 0 20.476562 17.978516 z M 27.476562 17.978516 A 1.50015 1.50015 0 0 0 26 19.5 L 26 34.5"></path>
                                                    </svg>
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

</x-app-layout>

<style>
    /* CSS styles for the table */
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
        color: black;
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

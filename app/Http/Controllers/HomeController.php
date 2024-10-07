<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Agensi;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Http\Request;
use App\Models\Ticket; // Assuming you have a Ticket model
use App\Models\ContactSubmission;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Get the requested year or default to the current year
        $year = $request->input('year', Carbon::now()->year);

        // Fetch monthly ticket counts
        $monthlyTickets = Ticket::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                                ->whereYear('created_at', $year)
                                ->groupBy('month')
                                ->orderBy('month')
                                ->pluck('count', 'month')
                                ->toArray();

        // Fetch new users count for each month
        $monthlyUsers = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                            ->whereYear('created_at', $year)
                            ->groupBy('month')
                            ->orderBy('month')
                            ->pluck('count', 'month')
                            ->toArray();

        // Fill missing months with 0
        $monthlyTicketsData = [];
        $monthlyUsersData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyTicketsData[$i] = $monthlyTickets[$i] ?? 0;
            $monthlyUsersData[$i] = $monthlyUsers[$i] ?? 0;
        }

        // Calculate total tickets and total users for the year
        $totalTickets = array_sum($monthlyTicketsData);
        $totalUsers = array_sum($monthlyUsersData);

        // Additional metrics
        // 1. Count of resolved tickets
        $resolvedTickets = Ticket::where('status', 'resolved')->count();

        // 2. Count of new user requests (assuming 'pending' status is used for new requests)
        $newUserRequests = ContactSubmission::whereDate('created_at', Carbon::today())->count();

        // 3. Count of new tickets created today
        // $newTickets = Ticket::whereDate('created_at', Carbon::today())->count();
        $newTickets = Ticket::where('status', 'submitted')->count();

        // 4. Count of critical tickets (assuming 'critical' priority is used)
        $criticalTickets = Ticket::where('severity', 'critical')->count();

        // Pass data to the view
        return view('admin.dashboard', [
            'monthlyTickets' => $monthlyTicketsData,
            'monthlyUsers' => $monthlyUsersData,
            'totalTickets' => $totalTickets,
            'totalUsers' => $totalUsers,
            'selectedYear' => $year,
            'resolvedTickets' => $resolvedTickets,
            'newUserRequests' => $newUserRequests,
            'newTickets' => $newTickets,
            'criticalTickets' => $criticalTickets
        ]);
    }

    public function listUsers(Request $request)
    {
        $agensis = Agensi::all(); // Fetch all agensis
        $users = User::query();

        // Get the 'per_page' query parameter, defaulting to 10 if not present
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search');

        // Fetch users with pagination and search functionality
        $query = User::query();

        if ($search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('agensi_id', 'LIKE', "%{$search}%");
        }

        $users = $query->paginate($perPage);

        // Count users by user type
        $userCounts = [
            'admin' => User::where('usertype', 'admin')->count(),
            'staff' => User::where('usertype', 'staff')->count(),
            'user' => User::where('usertype', 'user')->count(),
        ];

        return view('admin.users.index', compact('agensis', 'users', 'search', 'userCounts'));
    }


    public function createUser()
    {
        $agensis = Agensi::all(); // Fetch all agensis
        $users = User::all(); // Fetch all users from the database
        // Fetching new user requests
        $submissions = ContactSubmission::orderBy('created_at', 'desc')->take(5)->get(); // Adjust as needed

        return view('admin.users.create', compact('agensis','users', 'submissions'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $agensis = Agensi::all(); // Fetch all Agensi records
        return view('admin.users.edit', compact('user', 'agensis'));
    }

    public function storeUser(Request $request)
    {
        // Validate and store the new user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'agensi_id' => 'required|exists:agensis,id',
        ]);

        // Create new user logic
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'agensi_id' => $request->agensi_id,
        ]);

        // Redirect or return response
        return redirect()->route('admin.users.index')->with('success', 'User registered successfully.');
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        // Retrieve the user record from the database
        $user = User::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'agensi_id' => 'required|exists:agensis,id',
            'usertype' => 'required|string|in:admin,staff,user',
        ]);

        // Update the user record with the validated data
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->address = $validatedData['address'];
        $user->agensi_id = $validatedData['agensi_id'];
        $user->usertype = $validatedData['usertype'];

        // Update the password only if it's provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Redirect the user to a specific page with a success message
        return redirect()->route('admin.users.edit', $user->id)->with('success', 'User updated successfully.');
    }

    public function destroyUser($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Check if there are related tickets
        if ($user->tickets()->count() > 0) {
            return redirect()->route('admin.users.index')->with('error', 'User cannot be deleted because there are related tickets.');
        }

        // Delete the user
        $user->delete();

        // Redirect the user to a specific page with a success message
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function updateUserType(Request $request, User $user)
    {
        $request->validate([
            'usertype' => 'required|in:admin,staff,user',
        ]);

        $user->usertype = $request->input('usertype');
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User type updated successfully.');
    }

}


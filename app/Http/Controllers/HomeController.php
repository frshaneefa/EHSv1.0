<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

class HomeController extends Controller
{
    public function index()
    {
        $agensis = Agensi::all(); // Fetch all agensis
        $users = User::all(); // Fetch all users from the database

        return view('admin.dashboard', compact('agensis','users'));
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

        return view('admin.users.edit', compact('user'));
    }

    public function storeUser(Request $request)
    {
        // Validate and store the new user
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'agensi_id' => 'required|exists:agensis,id',
        ]);

        // Create new user logic
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'agensi_id' => $request->agensi_id,
        ]);

        // Redirect or return response
        return redirect()->route('admin.dashboard')->with('success', 'User registered successfully.');
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
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'agensi' => 'required|exists:agensis,id',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Retrieve the user record from the database
        $user = User::findOrFail($id);

        // Update the user record with the validated data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->agensi_id = $request->agensi;

        // Update the password only if it's provided
        if ($request->password) {
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

        // Delete the user
        $user->delete();

        // Redirect the user to a specific page with a success message
        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }
}


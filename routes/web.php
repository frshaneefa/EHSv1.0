<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\AdminLeaveRequestController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Mail;
use App\Mail\TicketSubmitted;
use App\Models\Ticket;

Route::get('/', function () {
    return view('welcome');
});

Route::name('dashboard')->get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Ticket routes
    Route::get('/submit-ticket', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/submit-ticket', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/ticket-dashboard', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('tickets.show');
    Route::get('/tickets/print', [TicketController::class, 'print'])->name('tickets.print');

});

// Routes for authenticated admins
Route::middleware('auth', 'admin')->group(function () {
    // Admin dashboard
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    // User management routes
    Route::get('admin/management/users', [HomeController::class, 'listUsers'])->name('admin.users.index');
    Route::get('admin/management/users/create', [HomeController::class, 'createUser'])->name('admin.users.create');
    Route::post('admin/management/users/store', [HomeController::class, 'storeUser'])->name('admin.users.store');
    Route::get('admin/management/users/{id}/edit', [HomeController::class, 'editUser'])->name('admin.users.edit');
    Route::put('admin/management/users/{id}', [HomeController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('admin/management/users/{id}', [HomeController::class, 'destroyUser'])->name('admin.users.destroy');
    Route::patch('/admin/management/{user}/update-user-type', [HomeController::class, 'updateUserType'])->name('admin.users.updateUserType');


    // Ticket management routes for admin
    Route::get('admin/tickets', [AdminTicketController::class, 'index'])->name('admin.tickets.index');
    Route::get('admin/tickets/create', [AdminTicketController::class, 'create'])->name('admin.tickets.create');
    Route::post('admin/tickets/store', [AdminTicketController::class, 'store'])->name('admin.tickets.store');
    Route::get('admin/ticket/{id}', [AdminTicketController::class, 'show'])->name('admin.tickets.show');
    Route::get('admin/tickets/print', [AdminTicketController::class, 'print'])->name('admin.tickets.print');

    Route::get('admin/ticket/{id}/edit', [AdminTicketController::class, 'edit'])->name('admin.tickets.edit');
    Route::put('admin/ticket/{id}', [AdminTicketController::class, 'update'])->name('admin.tickets.update');
    Route::delete('admin/ticket/{id}', [AdminTicketController::class, 'destroy'])->name('admin.tickets.destroy');
    
});


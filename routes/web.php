<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminTicketController;

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
    
    Route::name('tickets.index')->get('/ticket-dashboard', [TicketController::class, 'index']);
    Route::name('tickets.create')->get('/submit-ticket', [TicketController::class, 'create']);

    Route::get('/submit-ticket', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/submit-ticket', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/ticket-dashboard', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('tickets.show');
    Route::get('/tickets/print', [TicketController::class, 'print'])->name('tickets.print');
});

Route::middleware('auth', 'admin')->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::post('admin/dashboard/users/store', [HomeController::class, 'storeUser'])->name('admin.dashboard.store');
    Route::get('admin/dashboard/users/{id}/edit', [HomeController::class, 'editUser'])->name('admin.users.edit');
    Route::delete('admin/dashboard/users/{id}', [HomeController::class, 'destroyUser'])->name('admin.dashboard.destroy');


    Route::get('admin/tickets', [AdminTicketController::class, 'index'])->name('admin.tickets.index');
    Route::get('admin/tickets/create', [AdminTicketController::class, 'create'])->name('admin.tickets.create');
    Route::post('admin/tickets/store', [AdminTicketController::class, 'store'])->name('admin.tickets.store');
    Route::get('admin/ticket/{id}', [AdminTicketController::class, 'show'])->name('admin.tickets.show');
    Route::get('admin/tickets/print', [AdminTicketController::class, 'print'])->name('admin.tickets.print');

    Route::get('admin/ticket/{id}/edit', [AdminTicketController::class, 'edit'])->name('admin.tickets.edit');
    Route::put('admin/ticket/{id}', [AdminTicketController::class, 'update'])->name('admin.tickets.update');
    Route::delete('admin/ticket/{id}', [AdminTicketController::class, 'destroy'])->name('admin.tickets.destroy');

});


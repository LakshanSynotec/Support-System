<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('tickets/create');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/ticket/create', [TicketController::class, 'create'])->name('tickets.create'); // Show form
Route::post('/ticket/store', [TicketController::class, 'store'])->name('tickets.store'); // Handle form submission
Route::get('/ticket/status', [TicketController::class, 'status'])->name('tickets.status');
Route::get('/ticket/{ticket}/edit', [TicketController::class, 'edit'])->name('edit');
Route::post('/ticket/status', [TicketController::class, 'checkStatus']);
Route::put('/ticket/{ticket}/update', [TicketController::class, 'update'])->name('ticket.update');
Route::delete('/ticket/{ticket}', [TicketController::class, 'destroy'])->name('ticket.destroy');

// Agent Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [TicketController::class, 'index'])->name('dashboard');
    Route::get('/ticket/{ticket}', [TicketController::class, 'show'])->name(name: 'show');
    Route::post('/ticket/{ticket}/reply', [ReplyController::class, 'store']);

});

require __DIR__.'/auth.php';

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

Route::get('/ticket/create', [TicketController::class, 'create']);
Route::post('/ticket/store', [TicketController::class, 'store']);
Route::get('/ticket/status', [TicketController::class, 'status']);
Route::post('/ticket/status', [TicketController::class, 'checkStatus']);

// Agent Authentication
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [TicketController::class, 'index']);
    Route::get('/ticket/{ticket}', [TicketController::class, 'show']);
    Route::post('/ticket/{ticket}/reply', [ReplyController::class, 'store']);
});

require __DIR__.'/auth.php';

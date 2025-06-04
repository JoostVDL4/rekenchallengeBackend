<?php

use App\Http\Controllers\RekenVragenController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Default welcome route
Route::get('/', function () {
    return view('welcome');
});

// login route for authenticated and verified users
Route::get('/login', function () {
    return view('login');
})->middleware(['auth', 'verified'])->name('login');

// Profile routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes for login, register, etc.
Auth::routes();

// API routes for reken-vragen
Route::prefix('api')->group(function () {
    Route::get('reken-vragen', [RekenVragenController::class, 'index']);
    Route::post('reken-vragen', [RekenVragenController::class, 'store']);
    Route::get('reken-vragen/{reken_vragen}', [RekenVragenController::class, 'show']);
    Route::put('reken-vragen/{reken_vragen}', [RekenVragenController::class, 'update']);
    Route::delete('reken-vragen/{reken_vragen}', [RekenVragenController::class, 'destroy']);
    Route::middleware('auth')->post('/store-question', [RekenVragenController::class, 'store'])->name('questions.store');

});

// Add question route, restricted to authenticated users
Route::middleware('auth')->get('/add-question', function () {
    return view('add-question');
});

// Admin routes, requiring both authentication and an 'admin' middleware (make sure 'admin' is defined)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.login');
    })->name('admin.login');
});

// Question management routes
Route::middleware('auth')->group(function () {
    // Route for managing questions (view all questions for management)
    Route::get('/manage-questions', [RekenVragenController::class, 'manage'])->name('questions.manage');
    
    // Route for editing a question
    Route::get('/edit-question/{id}', [RekenVragenController::class, 'edit'])->name('questions.edit');
    
    // Route for updating a question
    Route::put('/update-question/{id}', [RekenVragenController::class, 'update'])->name('questions.update');
    
    // Route for deleting a question
    Route::delete('/delete-question/{id}', [RekenVragenController::class, 'destroy'])->name('questions.destroy');
});

// Include authentication routes (login, registration, etc.)
require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

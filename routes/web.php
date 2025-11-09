<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;
use App\Mail\RegisterConfirmationMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/test-mail', function () {
//     Mail::to('asiarahman104@gmail.com')->send(new RegisterConfirmationMail());
//     return 'Mail Sent';
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show');
    
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users', 'store')->name('users.store');
        Route::get('/users/{user}', 'show')->name('users.show');        
    });

    Route::middleware('role:1,3')->group(function () {
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
    
    // Route::resource('/users', UserController::class)->middleware('role:1,3');
    Route::resource('/status', StatusController::class);
    Route::resource('/gallery', GalleryController::class)->except(['edit', 'update']);
});


require __DIR__.'/auth.php';

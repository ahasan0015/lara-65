<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\TraineeController;
use App\Http\Controllers\UserController;
use App\Models\Trainee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.pages.welcome', [
        'name' => 'Mina',
        'country' => 'BD',
    ]);
});
// Route::get('/users/{username}/profile/{id?}', function ($username, $id=null) {
//     return view('pages/users',[
//         'user' => $username,
//         'id' => $id
//     ]);
// });

// Route::get('/about', function () {
//     return view('pages/about');
// });

// OR
Route::view('/about', 'pages/about');

// Route::get('/trainees', function () {
//     // $trainees = [
//     //         [
//     //             'id' => 1,
//     //             'name' => 'Mina',
//     //             'email' => 'MvXbM@example.com',
//     //             'country' => 'BD',
//     //             'is_active' => true
//     //         ],
//     //         [
//     //             'id' => 2,
//     //             'name' => 'Raju',
//     //             'email' => 'raju@example.com',
//     //             'country' => 'IN',
//     //             'is_active' => false
//     //         ],
//     //         [
//     //             'id' => 3,
//     //             'name' => 'Rani',
//     //             'email' => 'rani@example.com',
//     //             'country' => 'US',
//     //             'is_active' => true
//     //         ]
//     //     ];
//     return view('pages.trainees.index',[
//         // 'trainees' => $trainees
//         'trainees' => Trainee::all()
//     ]);
// });

Route::get('/trainees', [TraineeController::class, 'index'])->name('trainees.index');

// Route::get('/trainees/{id}', function ($id) {
//     // $trainees = [
//     //         [
//     //             'id' => 1,
//     //             'name' => 'Mina',
//     //             'email' => 'MvXbM@example.com',
//     //             'country' => 'BD',
//     //             'is_active' => true
//     //         ],
//     //         [
//     //             'id' => 2,
//     //             'name' => 'Raju',
//     //             'email' => 'raju@example.com',
//     //             'country' => 'IN',
//     //             'is_active' => false
//     //         ],
//     //         [
//     //             'id' => 3,
//     //             'name' => 'Rani',
//     //             'email' => 'rani@example.com',
//     //             'country' => 'US',
//     //             'is_active' => true
//     //         ]
//     //     ];
//     // $single = array_filter($trainees, fn($item) => $item['id'] == $id);
//     // $single = reset($single);
//     // dd($single);

//     return view('pages.trainees.show', [
//         // 'id' => $id,
//         // 'trainee' => $single
//         'trainee' => Trainee::findTrainee($id)
//     ]);
// });

Route::get('/trainees/{id}', [TraineeController::class, 'show'])->name('trainee-details');

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/{id}', [RoleController::class, 'show'])->name('roles.show');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/tt', function () {
    return view('auth/register2');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/staff', function () {
    return view('staff');
})->middleware(['auth', 'verified'])->name('staff');

Route::get('/appointments', [AppointmentController::class, 'index'], function () {
    return view('appointments');
})->middleware(['auth', 'verified'])->name('appointments');

Route::get('appointments/delete/{id}', [AppointmentController::class, 'delete'], function () {
    return view('appointments');
})->middleware(['auth', 'verified']);

Route::get('edit/{id}', [AppointmentController::class, 'edit'], function () {
    return view('appointments');
})->middleware(['auth', 'verified']);

Route::put('update-data/{id}', [AppointmentController::class, 'update'], function () {
    return view('appointments');
})->middleware(['auth', 'verified']);

Route::post('appointments/create', [AppointmentController::class, 'create'], function () {
    return view('appointments');
})->middleware(['auth', 'verified'])->name('appointments.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';

require __DIR__.'/employee.php';

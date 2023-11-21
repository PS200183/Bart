<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'user-role:admin'])->group(function () {
    Route::put('shift/{id}', [ScheduleController::class, 'update'])->name('shift.update');
    Route::get('/shift', [ScheduleController::class, 'index'])->name('shift.index');
    Route::post('/shift', [ScheduleController::class, 'store'])->name('shift.store');
    Route::delete('/shift/{id}', [ScheduleController::class, 'destroy'])->name('shift.destroy');

    Route::get('/employeeschedules', [EmployeeController::class, 'index'])->name('employeeschedules.index');
    Route::post('/employeeschedules', [EmployeeController::class, 'store'])->name('employeeschedules.store');
    Route::put('/employeeschedules/{employee}', [EmployeeController::class, 'update'])->name('employeeschedules.update');
    Route::delete('/employeeschedules/{employee}', [EmployeeController::class, 'destroy'])->name('employeeschedules.destroy');
    Route::get('/admin/dashboard', function () {
        return view('test');
    })->name('admin.dashboard');
});

Route::get('/Loginklant', function () {
    return view('loginklant');
});

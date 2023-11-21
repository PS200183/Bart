<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FullCalenderController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'user-role:employee,admin'])->group(function () {
    Route::get('/sick', [EmployeeController::class, 'sick'])->name('employee.sick');

    Route::get('/klok', [EmployeeController::class, 'klok'])->name('employee.klok');

    Route::post('/klok', [EmployeeController::class, 'klokin'])->name('employee.klokin');

    Route::post('/klokout', [EmployeeController::class, 'klokout'])->name('employee.klokout');

    Route::post('/sick', [EmployeeController::class, 'sickreport'])->name('employee.sickreport');

    Route::get('/schedule', [FullCalenderController::class, 'index'])->name('schedule.index');
});

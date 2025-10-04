<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Department;
use App\Http\Controllers\Employee;
use App\Http\Controllers\Attendance;
use App\Http\Controllers\AttendanceHistory;

// Redirect root ke Departement
Route::get('/', function () {
    return redirect()->route('departement.index');
});

/*
|--------------------------------------------------------------------------
| Departement Routes
|--------------------------------------------------------------------------
*/
Route::prefix('departement')->name('departement.')->group(function () {
    Route::get('/', [Department::class, 'index'])->name('index');
    Route::get('/create', [Department::class, 'create'])->name('create');
    Route::post('/store', [Department::class, 'store'])->name('store');
    Route::get('/edit/{id}', [Department::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [Department::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [Department::class, 'destroy'])->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
*/
Route::prefix('employees')->name('employee.')->group(function () {
    Route::get('/', [Employee::class, 'index'])->name('index');
    Route::get('/create', [Employee::class, 'create'])->name('create');
    Route::post('/store', [Employee::class, 'store'])->name('store');
    Route::get('/edit/{id}', [Employee::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [Employee::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [Employee::class, 'destroy'])->name('destroy');
});

/*
|--------------------------------------------------------------------------
| Attendance Routes
|--------------------------------------------------------------------------
*/
Route::prefix('attendance')->name('attendance.')->group(function () {
    Route::get('/', [Attendance::class, 'index'])->name('index');
    Route::post('/checkin', [Attendance::class, 'checkin'])->name('checkin');
    Route::put('/checkout', [Attendance::class, 'checkout'])->name('checkout');
});

/*
|--------------------------------------------------------------------------
| Attendance History / Log Routes
|--------------------------------------------------------------------------
*/
Route::prefix('attendance-history')->name('attendance-history.')->group(function () {
    Route::get('/', [AttendanceHistory::class, 'index'])->name('index');
    Route::get('/{employeeId}', [AttendanceHistory::class, 'show'])->name('show');
});

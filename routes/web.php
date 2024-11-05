<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// Route::get('admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'Admin']);

Route::middleware(['auth', 'Admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index']);

    Route::get('company', [CompanyController::class, 'index'])->name('company');
    Route::get('company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('company/store', [CompanyController::class, 'store'])->name('company.store');
    Route::get('company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('company/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('company/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');

    Route::get('admin/employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('employee/create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::post('employee/store', [EmployeeController::class, 'store'])->name('employee.store');
    Route::get('employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('employee/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('employee/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
});

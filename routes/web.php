<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\LeaveController;

Route::get('/', function () {
  return view('welcome');
});

Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('positions', PositionController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('salaries', SalaryController::class);
Route::resource('leaves', LeaveController::class);
Route::put('/leaves/{leave}/verify', [LeaveController::class, 'verify'])->name('leaves.verify');
<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('employee/add', [EmployeeController::class, 'add']);
Route::post('employee/create', [EmployeeController::class, 'create']);


Route::get('employee/edit/{id}', [EmployeeController::class, 'edit_employee']);
Route::put('employee/update/', [EmployeeController::class, 'update_employee']);

Route::get('employee/delete/{id}', [EmployeeController::class, 'delete_employee']);

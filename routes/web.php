<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addEmployee', [App\Http\Controllers\EmployeeController::class, 'createEmployeeForm'])->name('addEmployeeForm');
Route::post('/addEmployee', [App\Http\Controllers\EmployeeController::class, 'createEmployee'])->name('addEmployee');
Route::get('/editEmployee/{id}', [App\Http\Controllers\EmployeeController::class, 'editEmployee'])->name('Employees.edit');
Route::post('/updateEmployee/{id}', [App\Http\Controllers\EmployeeController::class, 'updateEmployee'])->name('Employees.update');
Route::get('/deleteEmployee/{id}', [App\Http\Controllers\EmployeeController::class, 'deleteEmployee'])->name('Employees.delete');
Route::get('/addTaskForm', [App\Http\Controllers\TaskController::class, 'addTaskForm'])->name('addTaskForm');
Route::post('/addTask', [App\Http\Controllers\TaskController::class, 'addTask'])->name('addTask');
Route::get('/assignTaskForm/{id}', [App\Http\Controllers\TaskController::class, 'assignTaskForm'])->name('Employees.assignTaskForm');
Route::post('/assignTask', [App\Http\Controllers\TaskController::class, 'assignTask'])->name('assignTask');

Route::get('/editTask/{id}', [App\Http\Controllers\TaskController::class, 'editTask'])->name('Tasks.edit');
Route::post('/updateTask/{id}', [App\Http\Controllers\TaskController::class, 'updateTask'])->name('Task.update');
Route::get('/changeAssigneeForm/{id}', [App\Http\Controllers\TaskController::class, 'changeAssigneeForm'])->name('Tasks.changeAssignee');
Route::post('/changeAssignee', [App\Http\Controllers\TaskController::class, 'changeAssignee'])->name('changeAssignee');

Route::get('/work_status/{id}/{status}', [App\Http\Controllers\TaskController::class, 'workStatus'])->name('Tasks.work_status');


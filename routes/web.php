<?php

use App\Http\Controllers\Backend\ApprovalHrdController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\Employee\EmployeeController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes([
	'register' => false, // Registration Routes...
	'reset' => false, // Password Reset Routes...
	'verify' => false, // Email Verification Routes...
]);

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
	Route::get('/', [BackendController::class, 'index'])->name('backend');
  Route::get('/backend/logout', [BackendController::class, 'logout'])->name('backend.logout');
	Route::get('/backend/password', [BackendController::class, 'password'])->name('backend.password');
	Route::get('/backend/history', [BackendController::class, 'history'])->name('backend.history');
	Route::post('/backend/get_department_jabatan', [BackendController::class, 'get_department_jabatan'])->name('backend.get_department_jabatan');

	Route::get('/backend/users', [UserController::class, 'index'])->name('backend.users');

	Route::get('/backend/approval_hrd', [ApprovalHrdController::class, 'index'])->name('backend.approval_hrd');

	Route::get('/backend/employee', [EmployeeController::class, 'index'])->name('backend.employee');

	Route::get('/backend/employee/create', [EmployeeController::class, 'create'])->name('backend.employee.create');
	Route::post('/backend/employee/store', [EmployeeController::class, 'store'])->name('backend.employee.store');
	Route::get('/backend/employee/detail/{id}', [EmployeeController::class, 'detail'])->name('backend.employee.detail');
});

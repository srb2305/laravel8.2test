<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PermissionController;


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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Route::middleware([Admin::class])->group(function () {



Route::get('permission', [PermissionController::class, 'index']);
Route::post('/permission', [PermissionController::class, 'store']);

Route::get('/add_user', [UserController::class, 'create']);
Route::post('/user-store', [UserController::class, 'store']);
Route::get('/user_list', [UserController::class, 'index']);
Route::post('/user-list', [UserController::class, 'ajax']);
Route::get('/delete-user/{id}', [UserController::class, 'destroy']);
Route::get('/user_edit/{id}', [UserController::class, 'edit']);
Route::post('/user_upadate', [UserController::class, 'update']);

Route::get('/add_department', [DepartmentController::class, 'create']);
Route::post('/department_store', [DepartmentController::class, 'store']);
Route::get('/department_list', [DepartmentController::class, 'index']);
Route::post('/department-list', [DepartmentController::class, 'ajax']);
Route::get('/delete-department/{id}', [DepartmentController::class, 'destroy']);
Route::get('/department_edit/{id}', [DepartmentController::class, 'edit']);
Route::post('/department_update', [DepartmentController::class, 'update']);

Route::get('/add_position', [PositionController::class, 'create']);
Route::post('/position_store', [PositionController::class, 'store']);
Route::get('/position_list', [PositionController::class, 'index']);
Route::post('/position-list', [PositionController::class, 'ajax']);
Route::get('/delete-position/{id}', [PositionController::class, 'destroy']);
Route::get('/position_edit/{id}', [PositionController::class, 'edit']);
Route::post('/position_update', [PositionController::class, 'update']);

//});
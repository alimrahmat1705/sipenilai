<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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
    return view('dashboard');
});


//User
Route::get('/user',[UserController::class,'index']);
Route::get('/user-create',[UserController::class,'create']);
Route::post('/user-create/post',[UserController::class,'store'])->name('user.post');
Route::get('user-update',[UserController::class,'edit']);


//Role
Route::get('/role',[RoleController::class,'index']);
Route::post('/role-create/post',[RoleController::class,'store'])->name('role.post');
Route::put('/role-update/{id}',[RoleController::class,'update'])->name('role.update');

<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/all-users',[\App\Http\Controllers\UserController::class,'getAllUsers']);
Route::get('/add-user',[\App\Http\Controllers\UserController::class,'addUserView']);
Route::get('/api/users',[\App\Http\Controllers\UserController::class,'getUsersList'])->name('users.list');
Route::get('/api/users/{id}',[\App\Http\Controllers\UserController::class,'deleteUser'])->name('users.delete');
Route::post('/api/users',[\App\Http\Controllers\UserController::class,'addUser'])->name('users.add');

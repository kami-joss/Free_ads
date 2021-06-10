<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AdController;
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

Route::get('/register', [RegisterController::class, 'show']);
Route::post('/register', [RegisterController::class, 'create']);

Route::get('/login', [LoginController::class, 'show']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/user', [LoginController::class, 'check_connect']);
Route::get('/user', [UsersController::class, 'show']);
Route::post('/user', [UsersController::class, 'show']);
Route::get('/user/delete', [UsersController::class, 'destroy']);

Route::get('/edit', [UsersController::class, 'edit']);
Route::post('/edit', [UsersController::class, 'update']);

Route::get('/logout', [UsersController::class, 'logout']);

Route::get('/ad', [AdController::class, 'create']);
Route::post('/ad', [AdController::class, 'store']);
Route::get('/ad/{id}', [AdController::class, 'show']);

Route::get('/my_ads', [AdController::class, 'show_my_ads']);
Route::get('/my_ads/{id}', [AdController::class, 'show']);
Route::post('/my_ads/{id}', [AdController::class, 'show']);
Route::get('/my_ads/{id}/edit_ad', [AdController::class, 'edit']);
Route::post('/my_ads/{id}/edit_ad', [AdController::class, 'update']);

Route::get('my_ads/{id}/delete', [AdController::class, 'destroy']);

Route::get('/ads', [AdController::class, 'index']);

Route::get('edit_ad', [AdController::class, 'edit']);


<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('auth.login');

    Route::get('signup', [RegisterController::class, 'index'])->name('signup');
    Route::post('signup', [RegisterController::class, 'signup'])->name('auth.signup');
});

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('permissions', RoleController::class);
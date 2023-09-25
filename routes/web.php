<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ThingspeakController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AttendanceController;

Route::get('register', [AuthController::class, 'registerView'])->name('auth.register_view');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::get('login', [AuthController::class, 'loginView'])->name('auth.login_view');
Route::get('login_new', [AuthController::class, 'loginViewNew'])->name('auth.login_view_new');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google_callback');


Route::get('/', [AuthController::class, 'home'])->name('auth.home');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('auth.dashboard');


Route::group(['middleware' => 'login'], function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('users/index', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('users/show/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::put('users/update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('users/get/data', [UserController::class, 'getData'])->name('users.getData');
        Route::get('users/export/data', [UserController::class, 'export'])->name('users.export');

        Route::get('attendance/index', [AttendanceController::class, 'index'])->name('attendance.index');
        Route::get('attendance/edit/{id}', [AttendanceController::class, 'edit'])->name('attendance.edit');
        Route::put('attendance/update/{id}', [AttendanceController::class, 'update'])->name('attendance.update');
        Route::delete('attendance/destroy/{id}', [AttendanceController::class, 'destroy'])->name('attendance.destroy');

        Route::get('thingspeak/index', [ThingspeakController::class, 'index'])->name('thingspeak.index');
        Route::get('thingspeak/get/data', [ThingspeakController::class, 'getData'])->name('thingspeak.getData');
    });


    Route::group(['middleware' => ['role:employee|admin']], function () {
        Route::get('auth/user', [UserController::class, 'loggedInUser'])->name('users.details');

        Route::post('attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
        Route::get('attendance/show/{id}', [AttendanceController::class, 'show'])->name('attendance.show');
    });
});





// Default nameing
// Route::get('users', [UserController::class, 'index'])->name('users.index');
// Route::get('users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('users', [UserController::class, 'store'])->name('users.store');
// Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
// Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
// Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


// AdminLTE theme nameing
// Route::get('users/index', [UserController::class, 'index'])->name('users.index');
// Route::get('users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('users/store', [UserController::class, 'store'])->name('users.store');
// Route::get('users/show/{id}', [UserController::class, 'show'])->name('users.show');
// Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
// Route::put('users/update/{id}', [UserController::class, 'update'])->name('users.update');
// Route::delete('users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');

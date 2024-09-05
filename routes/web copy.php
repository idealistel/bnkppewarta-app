<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// route Admin start
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->middleware('role');

// Route::get('/admin', function () {
//     return view('admin.index');
// });

Route::get('/admin/sektor', function () {
    return view('admin.mgmt-jemaat.sektor.index');
});

Route::resource('/admin/pengguna', UserController::class);

Route::get('/', function () {
    return view('welcome');
});

// route Admin end

// route website start
// route website end
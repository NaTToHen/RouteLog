<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('login'); })->name('login');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/deslogar', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index'])->name('home');
Route::post('login', [LoginController::class, 'store'])->name('login');
Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

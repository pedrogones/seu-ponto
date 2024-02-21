<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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


require __DIR__ . '/auth.php';
Route::group(['middleware' => ['auth', 'permission:post_view']], function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
});
Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);
Route::resource('permissions', PermissionController::class)->parameter('permissions', 'role');


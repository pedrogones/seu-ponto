<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
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
Route::resource('roles', RoleController::class);
Route::resource('roles.permissions', PermissionController::class);
Route::resource('bater-ponto', AttendanceController::class);
//Route::get('bater-ponto/create',  'AttendanceController@create')->name('point_register.create');
//Route::put('bater-ponto/create',  'AttendanceController@update')->name('point_register.create');

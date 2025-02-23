<?php

use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\ModuleController;
use App\Http\Controllers\SuperAdmin\UserController;
use Illuminate\Support\Facades\Route;

// Bagian Dashboard Super Admin
Route::get('dashboard', DashboardController::class);

// Bagian Module Super Admin
Route::resource('module', ModuleController::class);
Route::post('module/add-role', [ModuleController::class, 'addRole']);
Route::get('module/delete-role/{role}', [ModuleController::class, 'deleteRole']);

// Bagian Pengguna Super Admin
Route::resource('pengguna', UserController::class);

<?php

use App\Http\Controllers\SuperAdmin\CheckInController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\EventController;
use App\Http\Controllers\SuperAdmin\LogoController;
use App\Http\Controllers\SuperAdmin\ManageIDCardController;
use App\Http\Controllers\SuperAdmin\ModuleController;
use App\Http\Controllers\SuperAdmin\RegistrasiController;
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

// Bagian Logo ID Card Super Admin
Route::resource('logo-idcard', LogoController::class);

// Bagian Manajemen Event Super Admin
Route::resource('event', EventController::class);

// Bagian Registrasi Event Super Admin
Route::resource('registration', RegistrasiController::class);
// Route::get('registrasi/success', [RegistrasiController::class, 'success'])->name('super-admin.registrasi.success');
Route::get('/registrasi/success/{id}', [RegistrasiController::class, 'success'])->name('super-admin.registrasi.success');

// Bagian Check In Event Super Admin
Route::resource('check-in', CheckInController::class);
Route::post('/check-in/validate', [CheckInController::class, 'validateCheckIn'])->name('super-admin.check-in.validate');

// Bagian Kelola ID Card Super Admin
Route::resource('manage-idcard', ManageIDCardController::class);
Route::get('/manage-idcard/success/{id}', [ManageIDCardController::class, 'success'])->name('super-admin.manage-idcard.success');

Route::get('/download/idcard/{id_peserta}', [RegistrasiController::class, 'downloadIdCard'])->name('super-admin.download.idcard');
Route::get('/export-peserta-pdf/{id}', [RegistrasiController::class, 'exportPDF'])->name('super-admin.export-peserta-pdf');
Route::get('/get-participant/{id_peserta}', [CheckInController::class, 'getParticipant'])->name('super-admin.get-participant');

Route::delete('/delete-peserta/{id}', [RegistrasiController::class, 'deletePeserta']);

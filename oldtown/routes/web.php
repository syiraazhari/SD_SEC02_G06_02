<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    return view('login');
});


Route::get('/login', function() {
    return view('login');
});

//staff
Route::group(['middleware' => ['auth', 'staff'], 'prefix' => 'staff'], function() {
    Route::get('/dashboard', [StaffController::class, 'index'])->name('dashboard');
    Route::get('/profile', [StaffController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [StaffController::class, 'edit'])->name('edit_profile');
    Route::post('/profile', [StaffController::class, 'update'])->name('update_profile');
    Route::get('/change-password', [StaffController::class, 'viewChangePassword'])->name('staff_view_change_password');
    Route::post('/change-password', [StaffController::class, 'changePassword'])->name('staff_change_password');
});


//admin
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function() {
    Route::get('/admin_dashboard', [AdminController::class, 'index'])->name('admin_dashboard');
    Route::get('/profile', [AdminController::class, 'show'])->name('admin_profile');
    Route::get('/profile/edit', [AdminController::class, 'edit'])->name('admin_edit_profile');
    Route::post('/profile', [AdminController::class, 'update'])->name('admin_update_profile');

    Route::get('/change-password', [AdminController::class, 'viewChangePassword'])->name('admin_view_change_password');
    Route::post('/change-password', [AdminController::class, 'changePassword'])->name('admin_change_password');
});


require __DIR__.'/auth.php';

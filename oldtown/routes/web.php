<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/test', function () {
    return view('edit-profile');
});

Route::middleware(['auth'])->group(function(){

    Route::get('/profile', [HomeController::class, 'index'])->name('view_profile');
    Route::get('/edit-profile', [HomeController::class, 'edit'])->name('edit_profile');
    Route::post('/edit-profile', [HomeController::class, 'update'])->name('update_profile');
    Route::get('/edit-password', [HomeController::class, 'viewEditPassword'])->name('edit_password');
    Route::post('/edit-password', [HomeController::class, 'updatePassword'])->name('update_password');
    Route::get('/edit-image', [HomeController::class, 'viewEditImage'])->name('edit_image');
    Route::post('/edit-image', [HomeController::class, 'updateImage'])->name('update_image');

});




// staff protected routes
Route::group(['middleware' => ['auth', 'staff'], 'prefix' => 'staff'], function () {
    Route::get('/dashboard', [HomeController::class, 'viewDashboard'])->name('staff_dashboard');

});

// admin protected routes
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard',  [HomeController::class, 'viewDashboard'])->name('admin_dashboard');
    Route::get('/staff', [StaffController::class, 'viewAllStaff'])->name('view-staff');
    Route::get('admin/view-staff/{id}', [StaffController::class, 'view']);
});


require __DIR__.'/auth.php';

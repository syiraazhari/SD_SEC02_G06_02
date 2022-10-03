<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/test', function () {
    return view('admin.menu.menus.view-menu');
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

    // Staff Function
    Route::get('/staff', [StaffController::class, 'viewAllStaff'])->name('view-staff');
    Route::get('staff/view-staff/{id}', [StaffController::class, 'show']);
    Route::get('staff/add-staff', [StaffController::class, 'viewAddStaff']);
    Route::post('staff/add-staff', [StaffController::class, 'store'])->name('add-staff');
    Route::get('staff/edit-staff/{id}', [StaffController::class, 'edit']);
    Route::post('staff/edit-staff/{id}', [StaffController::class, 'update'])->name('update-staff');
    Route::delete('staff/delete', [StaffController::class, 'delete'])->name('delete-staff');

    //Category Menu Function
    Route::get('menu/category', [CategoryController::class, 'index'])->name('category-view');
    Route::get('menu/category/add-category', [CategoryController::class, 'create']);
    Route::post('menu/category/add-category', [CategoryController::class, 'store'])->name('add-category');
    Route::get('menu/category/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::post('menu/category/edit-category/{id}', [CategoryController::class, 'update'])->name('update-category');
    Route::delete('category/delete', [CategoryController::class, 'destroy'])->name('delete-category');

    //Menu Function
    Route::get('menu/view-menu', [MenuController::class, 'index'])->name('menu-view');
    Route::get('menu/view-single-menu/{id}', [MenuController::class, 'show'])->name('view-single-menu');
    Route::get('menu/add-menu', [MenuController::class, 'create']);
    Route::post('menu/add-menu', [MenuController::class, 'store'])->name('add-menu');
    Route::delete('menu/delete', [MenuController::class, 'destroy'])->name('delete-menu');
    Route::get('menu/edit-menu/{id}', [MenuController::class, 'edit']);
    Route::post('menu/edit-menu/{id}', [MenuController::class, 'update'])->name('edit-menu');

});


require __DIR__.'/auth.php';

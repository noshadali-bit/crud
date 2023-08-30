<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\RoleMiddleware;

Auth::routes();

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('/all-user', [HomeController::class, 'all_user'])->name('all-user');

/********************  User Role 1 Routes ********************/ 
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/add-user', [DashboardController::class, 'add_user'])->name('add-user');
    Route::post('/create-user', [DashboardController::class, 'create_user'])->name('create-user');

    Route::get('/edit-user/{id}', [DashboardController::class, 'edit_user'])->name('edit-user');
    Route::get('/delete-user/{id}', [DashboardController::class, 'delete_user'])->name('delete-user');
    Route::post('/update-user', [DashboardController::class, 'update_user'])->name('update-user');
});

/********************  User Role 2, 3 Routes ********************/ 
Route::middleware(['auth', 'role:2', 'role:3'])->group(function () {
    Route::get('/admin', [HomeController::class, 'index']);
});

/********************  Admins Routes ********************/ 

Route::get('/admins', function () {
    return redirect('admin/login');
})->name('admin.admin');

Route::middleware(['guest'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('admin.showLoginForm');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login');
});

Route::middleware(['admin'])->prefix('admin')->namespace('admin')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    /****************  Adin Logout  *********************/    
    Route::get('admin/logout', [AdminController::class, 'admin_logout'])->name('admin.logout');
});

/********************  Create Admin  ********************/ 
/*
Route::get('/add-admin', [DashboardController::class, 'add_admin'])->name('add-admin');
Route::post('/create-admin', [DashboardController::class, 'create_admin'])->name('create-admin');
*/
/********************  Create Admin  ********************/
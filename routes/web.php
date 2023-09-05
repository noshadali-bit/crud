<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\sharkController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/all-user', [IndexController::class, 'all_user'])->name('all-user');

/********************  User Role 1 Routes ********************/ 
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/add-user', [HomeController::class, 'add_user'])->name('add-user');
    Route::post('/create-user', [HomeController::class, 'create_user'])->name('create-user');
    Route::get('/edit-user/{id}', [HomeController::class, 'edit_user'])->name('edit-user');
    Route::get('/delete-user/{id}', [HomeController::class, 'delete_user'])->name('delete-user');
    Route::post('/update-user', [HomeController::class, 'update_user'])->name('update-user');
});

/********************  User Role 2, 3 Routes ********************/ 
Route::middleware(['auth', 'role:2', 'role:3'])->group(function () {
    // Route::get('/admin', [HomeController::class, 'index']);
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

    /*FRONT END EDITOR*/
    Route::post('/statusAjaxUpdateCustom', [sharkController::class,'statusAjaxUpdateCustom']);
    Route::post('/statusAjaxUpdate', [sharkController::class,'statusAjaxUpdate']);
    Route::post('/updateFlagOnKey', [sharkController::class,'updateFlagOnKey']);
    /*FRONT END EDITOR End*/

   /*FRONT END IMAGE Upload*/
    Route::post('/imageUpload', [sharkController::class, 'imageUpload']);
    /*FRONT END IMAGE Upload END*/

});

/********************  Create Admin  ********************/ 
/*
Route::get('/add-admin', [HomeController::class, 'add_admin'])->name('add-admin');
Route::post('/create-admin', [HomeController::class, 'create_admin'])->name('create-admin');
*/
/********************  Create Admin  ********************/
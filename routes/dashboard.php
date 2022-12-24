<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\profileController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\CheckUserType;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth:admin,web'],
    'as' => 'dashboard.',
    'prefix' => 'admin/dashboard',
], function () {

    Route::get('profile', [profileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [profileController::class, 'update'])->name('profile.update');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/categories/trash', [CategoriesController::class, 'trash'])->name('categories.trash');
    Route::put('/categories/{category}/restore', [CategoriesController::class, 'restore'])->name('categories.restore');
    Route::delete('/categories/force-delete/{category}', [CategoriesController::class, 'forceDelete'])->name('categories.force-delete');

    Route::resources([
        'categories' => CategoriesController::class,
        'products' => ProductController::class,
        'roles' => RoleController::class,
        'admins' => AdminController::class,
        'users' => UserController::class
    ]);

});

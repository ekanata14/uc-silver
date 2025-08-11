<?php

use Illuminate\Support\Facades\Route;

// Landing Page Controller
use App\Http\Controllers\LandingPageController;

// Auth Controller
use App\Http\Controllers\AuthController;

// Admin Controller
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\UserController;

// Landing Page Route
Route::get('/', [LandingPageController::class, 'index'])->name('landing.index');
Route::get('/product-detail', [LandingPageController::class, 'productDetail'])->name('landing.product-detail');

// Authentication Routes
Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // User Management Routes (Admin)

    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Product Management Routes (Admin)
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{id}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // Order Management Routes (Admin)
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/admin/orders/create', [OrderController::class, 'create'])->name('admin.orders.create');
    Route::post('/admin/orders', [OrderController::class, 'store'])->name('admin.orders.store');
    Route::get('/admin/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::get('/admin/orders/{id}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('/admin/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
    Route::delete('/admin/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');

    // Category Management Routes (Admin)
    Route::get('/admin/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [\App\Http\Controllers\CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('/admin/categories/{category}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});

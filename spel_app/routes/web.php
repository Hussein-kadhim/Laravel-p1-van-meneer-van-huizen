<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderrowController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authenticatie routes (Publiek)
Route::get('/login', [AuthController::class, 'show'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Beschermde routes (Middleware auth)
Route::middleware('auth')->group(function () {
    // Spellen routes (Bekijken, Kopen, Reviewen)
    Route::post('products/{product}/buy', [ProductController::class, 'buy'])->name('products.buy');
    Route::post('products/{product}/reviews', [ProductController::class, 'addReview'])->name('products.reviews.store');

    Route::get('/categories/{id}', [CategoryController::class, 'get'])->name('categories.get');
    // Week 3: aanmaken en verwijderen van categorieën
    Route::post('/categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');
    Route::delete('/categories/{id}/delete', [CategoryController::class, 'delete'])
        ->name('categories.delete');

    Route::resource('categories', CategoryController::class);
    // Week 3: aanmaken en verwijderen van producten
    Route::post('/products/create', [ProductController::class, 'create'])
        ->name('products.create');
    Route::delete('/products/{id}/delete', [ProductController::class, 'delete'])
        ->name('products.delete');

    Route::resource('products', ProductController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('prices', PriceController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('orderrows', OrderrowController::class);
});


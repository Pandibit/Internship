<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::middleware(['role:admin', 'auth'])->group(function () {
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users-data', [\App\Http\Controllers\AdminController::class, 'usersData'])->name('admin.users-data');
    Route::post('/admin/add-user', [\App\Http\Controllers\AdminController::class, 'addUser'])->name('admin.add-user');
    Route::delete('/admin/destroy-user/{user}', [\App\Http\Controllers\AdminController::class, 'destroyUser'])->name('admin.destroy-user');
    Route::put('/admin/update-user/{user}', [\App\Http\Controllers\AdminController::class, 'updateUser'])->name('admin.update-user');

    Route::get('/admin/products', [\App\Http\Controllers\AdminController::class, 'products'])->name('admin.products');
    Route::get('/admin/products-data', [\App\Http\Controllers\AdminController::class, 'getDataForProducts'])->name('admin.products-data');
    Route::post('/admin/add-product', [\App\Http\Controllers\AdminController::class, 'addProduct'])->name('admin.add-product');
    Route::delete('/admin/destroy-product/{product}', [\App\Http\Controllers\AdminController::class, 'destroyProduct'])->name('admin.destroy-product');
    Route::put('/admin/update-product/{product}', [\App\Http\Controllers\AdminController::class, 'updateProduct'])->name('admin.update-product');

    Route::get('/admin/sales', [\App\Http\Controllers\AdminController::class, 'sales'])->name('admin.sales');
    Route::get('/admin/sales-data', [\App\Http\Controllers\AdminController::class, 'salesData'])->name('admin.sales-data');

    Route::get('/admin/inventory', [\App\Http\Controllers\AdminController::class, 'inventory'])->name('admin.inventory');
    Route::post('/admin/inventory-data', [\App\Http\Controllers\AdminController::class, 'getDataForInventory'])->name('admin.inventory-data');
    Route::post('/admin/inventory-delete-item/{inventory}', [\App\Http\Controllers\AdminController::class, 'inventoryDeleteItem'])->name('admin.inventory-delete-item');
    Route::put('/admin/inventory-update-item/{inventory}', [\App\Http\Controllers\AdminController::class, 'inventoryUpdateItem'])->name('admin.inventory-update-item');
});

Route::middleware(['role:storekeeper|admin', 'auth'])->group(function () {

});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('/register', [\App\Http\Controllers\RegisterUserController::class, 'index'])->name('register');
    Route::post('/register', [\App\Http\Controllers\RegisterUserController::class, 'store'])->name('register.store');
    Route::get('/login', [\App\Http\Controllers\SessionController::class, 'index'])->name('login');
    Route::post('/login', [\App\Http\Controllers\SessionController::class, 'store'])->name('login.store');
});
Route::delete('/logout', [\App\Http\Controllers\SessionController::class, 'destroy'])->middleware('auth');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{category:name}', [CategoryController::class, 'show'])->name('category');
Route::get('/products', [\App\Http\Controllers\ProductsController::class, 'index'])->name('products');
Route::get('/products/{product}', [\App\Http\Controllers\ProductsController::class, 'show'])->name('product');
Route::get('/shopping-cart', [\App\Http\Controllers\ShoppingCart::class, 'index'])->name('shopping-cart');
Route::post('/shopping-cart', [\App\Http\Controllers\ShoppingCart::class, 'store'])->name('shopping-cart.store');
Route::delete('/remove-item', [\App\Http\Controllers\ShoppingCart::class, 'destroy'])
    ->name('shopping-cart.removeItem');

Route::post('/checkout', [\App\Http\Controllers\ShoppingCart::class, 'checkout'])
    ->name('shopping-cart.checkout')
    ->middleware('auth');




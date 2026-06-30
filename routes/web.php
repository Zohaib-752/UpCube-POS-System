<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Pos\CategoryController;
use App\Http\Controllers\Admin\Pos\CustomerController;
use App\Http\Controllers\Admin\Pos\DefaultController;
use App\Http\Controllers\Admin\Pos\ProductController;
use App\Http\Controllers\Admin\Pos\PurchaseController;
use App\Http\Controllers\Admin\Pos\SupplierController;
use App\Http\Controllers\Admin\Pos\UnitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Auth All Route

Route::middleware('auth')->controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/admin/edit/profile', 'EditProfile')->name('admin.edit.profile');
    Route::put('/admin/update/profile', 'UpdateProfile')->name('admin.update.profile');
    Route::get('/admin/change/password', 'ChangePassword')->name('admin.change.password');
    Route::put('/admin/update/password', 'UpdatePassword')->name('admin.update.password');
});

// All Supplier Routes
Route::middleware('auth')->controller(SupplierController::class)->group(function () {
    Route::get('/admin/supplier/all', 'SupplierAll')->name('supplier.all');
    Route::get('/admin/supplier/add', 'SupplierCreate')->name('supplier.create');
    Route::post('/admin/supplier/store', 'SupplierStore')->name('supplier.store');
    Route::get('/admin/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit');
    Route::put('/admin/supplier/update{id}', 'SupplierUpdate')->name('supplier.update');
    Route::get('/admin/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete');
});

// All Customer Routes
Route::middleware('auth')->controller(CustomerController::class)->group(function () {
    Route::get('/admin/customer/all', 'CustomerAll')->name('customer.all');
    Route::get('/admin/customer/add', 'CustomerCreate')->name('customer.create');
    Route::post('/admin/customer/store', 'CustomerStore')->name('customer.store');
    Route::get('/admin/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
    Route::put('/admin/customer/update/{id}', 'CustomerUpdate')->name('customer.update');
    Route::get('/admin/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');
});

// All Unit Routes
Route::middleware('auth')->controller(UnitController::class)->group(function () {
    Route::get('/admin/unit/all', 'UnitAll')->name('unit.all');
    Route::get('/admin/unit/add', 'UnitCreate')->name('unit.create');
    Route::post('/admin/unit/store', 'UnitStore')->name('unit.store');
    Route::get('/admin/unit/edit/{id}', 'UnitEdit')->name('unit.edit');
    Route::put('/admin/unit/update/{id}', 'UnitUpdate')->name('unit.update');
    Route::get('/admin/unit/delete/{id}', 'UnitDelete')->name('unit.delete');
});

// All Category Routes
Route::middleware('auth')->controller(CategoryController::class)->group(function () {
    Route::get('/admin/category/all', 'CategoryAll')->name('category.all');
    Route::get('/admin/category/add', 'CategoryCreate')->name('category.create');
    Route::post('/admin/category/store', 'CategoryStore')->name('category.store');
    Route::get('/admin/category/edit/{id}', 'CategoryEdit')->name('category.edit');
    Route::put('/admin/category/update/{id}', 'CategoryUpdate')->name('category.update');
    Route::get('/admin/category/delete/{id}', 'CategoryDelete')->name('category.delete');
});

// All Product Routes
Route::middleware('auth')->controller(ProductController::class)->group(function () {
    Route::get('/admin/product/all', 'ProductAll')->name('product.all');
    Route::get('/admin/product/add', 'ProductCreate')->name('product.create');
    Route::post('/admin/product/store', 'ProductStore')->name('product.store');
    Route::get('/admin/product/edit/{id}', 'ProductEdit')->name('product.edit');
    Route::put('/admin/product/update/{id}', 'ProductUpdate')->name('product.update');
    Route::get('/admin/product/delete/{id}', 'ProductDelete')->name('product.delete');
});

// All Purchase Routes
Route::middleware('auth')->controller(PurchaseController::class)->group(function () {
    Route::get('/admin/purchase/all', 'PurchaseAll')->name('purchase.all');
    Route::get('/admin/purchase/add', 'PurchaseCreate')->name('purchase.create');
    Route::post('/admin/purchase/store', 'PurchaseStore')->name('purchase.store');
    Route::get('/admin/purchase/edit/{id}', 'PurchaseEdit')->name('purchase.edit');
    Route::put('/admin/purchase/update/{id}', 'PurchaseUpdate')->name('purchase.update');
    Route::get('/admin/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete');
});

// All Default Routes
Route::middleware('auth')->controller(DefaultController::class)->group(function () {
    Route::get('/admin/get-category', 'getCategory')->name('get.category');
    Route::get('/admin/get-product', 'getProduct')->name('get.product');
});

require __DIR__.'/auth.php';

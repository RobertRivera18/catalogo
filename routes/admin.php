<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\ShowProducts;
use App\Http\Livewire\Admin\CreateProduct;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CoverController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Livewire\Admin\ShowCategory;
use App\Http\Livewire\Admin\BrandsComponent;
use App\Http\Livewire\Admin\DepartmentComponent;
use App\Http\Livewire\Admin\ShowDepartment;
use App\Http\Livewire\Admin\CityComponent;
use App\Http\Livewire\Admin\UserComponent;



Route::get('/', ShowProducts::class)->name('admin.index');
Route::get('products/{product}/edit', EditProduct::class)->name('admin.products.edit');
Route::get('products/create', CreateProduct::class)->name('admin.products.create');
Route::post('products/{product}/files', [ProductController::class, 'files'])->name('admin.products.files');
Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::get('orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');

Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('categories/{category}', ShowCategory::class)->name('admin.show.categories');
Route::get('brands', BrandsComponent::class)->name('admin.brands.index');

Route::get('departments', DepartmentComponent::class)->name('admin.departments.index');
Route::get('departments/{department}', ShowDepartment::class, 'show')->name('admin.departments.show');
Route::get('users', UserComponent::class)->name('admin.users.index');

Route::get('cities/{city}', CityComponent::class)->name('admin.cities.show');
Route::resource('covers', CoverController::class)->names('admin.covers');

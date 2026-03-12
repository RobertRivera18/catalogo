<?php


use App\Models\Orders;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\PaymentOrder;
use App\Http\Livewire\ShoppingCart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;

Route::get('/', WelcomeController::class)->name('home');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('search', SearchController::class)->name('search');
Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');


Route::middleware(['auth'])->group(function () {
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/create', CreateOrder::class)->name('orders.create');
    Route::get('order/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('order/{order}/payment', PaymentOrder::class)->name('orders.payment');
});
// Route::get('prueba', function () {
//     $orders = Orders::where('user_id', 1)->select('content')->get()->map(function ($order) {
//         return json_decode($order->content, true);
//     });
//     $products = $orders->collapse();

//     dd($products->contains('id', 101));
// });
Route::post('reviews/{product}', [ReviewController::class, 'store'])->name('reviews.store');

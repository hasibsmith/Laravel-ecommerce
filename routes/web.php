<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Test;
use App\Http\Controllers\SslCommerzPaymentController;









Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');



Auth::routes(['verify' => true]);


Route::get('/', [BackendController::class, 'index'])->name('index');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('categories', CategoryController::class);

Route::resource('product', ProductController::class);

// Cart
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::put('cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('cart/{productId}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/cart/count', [CartController::class, 'getCartCount']);

Route::get('/category/{id}/products', [CategoryController::class, 'showProductsByCategory'])->name('category.products');

Route::get('/product/{id}', [ProductController::class, 'singleproduct'])->name('products.single');


// CheckoutController
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('cart/cashon', [CartController::class, 'cashon'])->name('cart.cashon');
Route::post('order/product', [CheckoutController::class, 'order'])->name('order');

// OrderController

Route::get('order_details', [OrderController::class, 'orderlist'])->name('order.details');
Route::get('orderapproved/{id}', [OrderController::class, 'orderapproved'])->name('order.approved');
Route::get('orderdone/{id}', [OrderController::class, 'orderdone'])->name('order.done');
Route::get('ordercancel/{id}', [OrderController::class, 'ordercancel'])->name('order.cancel');
// Route::get('myorder', [OrderController::class, 'myorder'])->name('myorder')->middleware('auth');
Route::get('order/feedback/{order_id}', [OrderController::class, 'feedback'])->name('order.feedback');
Route::post('order/feedback/{order_id}', [OrderController::class, 'submitFeedback'])->name('order.submitFeedback');

Route::get('orderprofile', [OrderController::class, 'orderprofile'])->name('order.profile');

Route::get('cupon', [OrderController::class, 'cupon'])->name('cupon');

Route::get('profileinfo', [Test::class, 'profileinfo'])->name('profileinfo');
Route::get('profile_details', [OrderController::class, 'profile_details'])->name('profile_details');



// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END





// 















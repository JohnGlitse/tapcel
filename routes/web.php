<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\GoogleController;

//// ALL PRODUCTS CONTROLLER ROUTES

Route::get('home', function () {
    return view('home');
});
Route::get('home', [ProductController::class, 'charts']);

Route::resource('product', ProductController::class);
 

Route::get('/', function () {
    return view('products.index');
});
Route::get('/', [ProductController::class, 'index']);

Route::get('products/dashboard', function(){
    return view('products.dashboard');
})->name('dashboard');

Route::get('products/dashboard', [ProductController::class, 'admin']);



// These routes only return views to the various pages
Route::get('pages/contact', function(){
    return view('pages.contact');
});


///// PRODUCT CART MANIPULATIONS CONTROLERS

Route::post('/add-To-Cart/{id}', [CartController::class, 'addToCart'])->name('add-To-Cart');
Route::get('cart', function(){
    return view('products.cart');
})->name('cart');

 
Route::get('/removeItem/{id}', [CartController::class, 'removed'])->name('removeItem');

////   ALL USER CONTROLLER ROUTES
 
Route::resource('users', UserController::class);

Route::get('login', function(){
    return view('users.login');
})->name('login');

Route::post('login', [UserController::class, 'login']);
Route::post('logout', [UserController::class, 'logout'])->name('logout');
 
// Route::get('products/dashboard', [ProductController::class, 'admin']);

 //Route::get('products/dashboard', [DashboardController::class, 'admin']);

 

// Route::get('/pay', [PaystackController::class, 'redirectToGateway'])->name('pay');
// Route::get('/pay', function(){
//     return view('/pay');
// });
// Route::get('/payment/callback', [PaystackController::class, 'handleGatewayCallback']);
 


// PASTACK PAMENT GATEWAY ROUTES
// Show form
Route::get('/pay', [PaystackController::class, 'showPaymentForm'])->name('payment.form');

// Handle form submission and redirect to Paystack
Route::post('/pay', [PaystackController::class, 'redirectToGateway'])->name('payment.redirect');

// Paystack callback
Route::get('/payment/callback', [PaystackController::class, 'handleGatewayCallback'])->name('payment.callback');


Route::get('auth/google/{id}', [GoogleController::class, 'edit']);
Route::get('auth/google', [GoogleController::class, 'update']);

/// GOOGLE SIGN UP AND LOGIN ROUTES
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);




// Route::get('users/updateGoogle', function(){
//     return view('users/updateGoogle');
// });



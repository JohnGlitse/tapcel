<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\BrandController;

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

Route::get('checkout', function(){
    return view('products.checkout');
})->name('checkout');

Route::get('confirmpayment', function(){
    return view('products.confirmpayment');
})->name('confirmpayment');

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

 
Route::get('profile', function(){
    return view('users.profile');
})->name('profile');
 
Route::get('userprofile', function(){
    return view('users.userprofile');
})->name('userprofile');

 

 

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


 
/// GOOGLE SIGN UP AND LOGIN ROUTES
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);




///// ROUTES FOR ALL BRANDS PAGES

Route::get('pages/samsung', function(){
    return view('pages/samsung');
})->name('samsung');

//  Route::get('pages.samsung', [BrandController::class, 'sam']);
Route::get('/samsung', [BrandController::class, 'samsung'])->name('samsung');

 

Route::get('pages/apple', function(){
    return view('pages/apple');
})->name('apple');
 
Route::get('/apple', [BrandController::class, 'apple'])->name('apple');

Route::get('pages/tecno', function(){
    return view('pages/tecno');
})->name('tecno');
 
Route::get('/tecno', [BrandController::class, 'tecno'])->name('tecno');
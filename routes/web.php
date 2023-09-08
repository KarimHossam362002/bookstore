<?php

use Illuminate\Support\Facades\Route;
Require __DIR__ . '/admin/admin.php';


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// USER ROUTES ONLY
//layout
Route::get('/layout', function () {
    return view('layout');

})->name('layout');

// About
Route::get('/about', function () {
    return view('about.index');

})->name('about');

// account
Route::get('/account', function () {
    return view('account.index');

})->name('login');
// account_details
Route::get('/account_details', function () {
    return view('account_details.index');

})->name('account_details');
// branches
Route::get('/branches', function () {
    return view('branches.index');

})->name('branches');
// checkout
Route::get('/checkout', function () {
    return view('checkout.index');

})->name('checkout');
// contact
Route::get('/contact', function () {
    return view('contact.index');

})->name('contact');
// favourites
Route::get('/favourites', function () {
    return view('favourites.index');

})->name('favourites');
// index
Route::get('/home', function () {
    return view('index.index');

})->name('index');
// order-details
Route::get('/order-details', function () {
    return view('order-details.index');

})->name('order-details');
// order-recieved
Route::get('/order-recieved', function () {
    return view('order-recieved.index');

})->name('order-recieved');
// orders
Route::get('/orders', function () {
    return view('orders.index');

})->name('orders');
// privacy-policy
Route::get('/privacy-policy', function () {
    return view('privacy-policy.index');

})->name('privacy-policy');
// profile
Route::get('/profile', function () {
    return view('profile.index');

})->name('profile');
// refund-policy
Route::get('/refund-policy', function () {
    return view('refund-policy.index');

})->name('refund-policy');
// shop
Route::get('/shop', function () {
    return view('shop.index');

})->name('shop');
// single-product
Route::get('/single-product', function () {
    return view('single-product.index');

})->name('single-product');
// truck-order
Route::get('/truck-order', function () {
    return view('truck-order.index');

})->name('truck-order');
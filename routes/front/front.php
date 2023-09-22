<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\WishlistController;

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

// User send Routes
// Orders
Route::get('/dashboard/orders',[OrderController::class,'index'])->name('orders.index');
Route::get('/dashboard/orders/{id}',[OrderController::class,'destroy'])->name('orders.delete');

//Contact messages
Route::get('/dashboard/contact_messages',[ContactMessageController::class,'index'])->name('contactmessage.index');
Route::delete('/dashboard/contact_messages/{id}',[ContactMessageController::class,'destroy'])->name('contactmessage.delete');
Route::post('/dashboard/contact',[ContactMessageController::class,'store'])->name('contactmessage.store');

//wishlists
Route::get('/dashboard/wishlists', [WishlistController::class,'index'])->name('wishlists.index');
Route::get('/dashboard/wishlists/{id}', [WishlistController::class,'destroy'])->name('wishlists.delete');

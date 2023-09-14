<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactMessageController;
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

//Contact messages
Route::get('/contact_messages',[ContactMessageController::class,'index'])->name('contactmessage.index');
Route::delete('/contact_messages/{id}',[ContactMessageController::class,'destroy'])->name('contactmessage.delete');
Route::post('/contact',[ContactMessageController::class,'store'])->name('contactmessage.store');

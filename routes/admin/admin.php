<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationContactController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

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
// ADMIN ROUTES ONLY

// Route::get('/dashboard', function () {
//     return view('admin.layout');

// })->name('dashboard');

// Home
Route::get('/dashboard',[HomeController::class,"index"])->name('dashboard');
// banners
Route::resource('/banners',BannerController::class)->except('show');
// branches
Route::resource('/branches',BranchController::class)->except('show');
//sliders
Route::resource('/sliders',SliderController::class)->except('show');
Route::resource('/informations',InformationContactController::class)->except('show');

//Contact messages
Route::get('/contact_messages',[ContactMessageController::class,'index'])->name('contactmessage.index');
Route::delete('/contact_messages/{id}',[ContactMessageController::class,'destroy'])->name('contactmessage.delete');
Route::post('/contact',[ContactMessageController::class,'store'])->name('contactmessage.store');
?>

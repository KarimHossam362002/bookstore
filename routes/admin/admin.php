<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\Front\AdminDisplayController;
use App\Http\Controllers\Front\UserDisplayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellingFeatureController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
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
// users
Route::resource('/dashboard/users',UserController::class)->except('show');
// banners
Route::resource('/dashboard/banners',BannerController::class)->except('show');
// branches
Route::resource('/dashboard/branches',BranchController::class)->except('show');
//sliders
Route::resource('/dashboard/sliders',SliderController::class)->except('show');
// informations
Route::resource('/dashboard/informations',InformationContactController::class)->except('show');
//sellings
Route::resource('/dashboard/sellings',SellingFeatureController::class)->except('show');
// categories
Route::resource('/dashboard/categories', CategoryController::class)->except('show');
// products
Route::resource('/dashboard/products', ProductController::class);
// tags
Route::resource('/dashboard/tags', TagController::class)->except('show');
// faqs
Route::resource('/dashboard/faqs', FaqController::class)->except('show');

// user dashboard routes
Route::get("/dashboard/users",[UserDisplayController::class,'index'])->name('users.dashboard');
Route::get("/dashboard/admins",[AdminDisplayController::class,'index'])->name('admins.dashboard');
?>

<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    function index(){
        $wishlists = Wishlist::get();
        return view('admin.wishlist.index',compact('wishlists'));
    }
}

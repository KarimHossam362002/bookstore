<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    function index(){
        $wishlists = Wishlist::paginate(5);
        return view('admin.wishlist.index',compact('wishlists'));
    }
    function destroy(string $id){
        Wishlist::where('id', $id)->delete();
        return back()->with('success','Wishlist deleted successfully');
    }
}

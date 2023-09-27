<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function index(){
        $carts = Cart::paginate(5);
        return view('admin.cart.index' , compact('carts'));
    }
    function destroy(string $id){
        Cart::where('id', $id)->delete();
        return back()->with('success', 'Cart deleted successfully');
    }
}

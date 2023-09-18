<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function index(){
        $orders = Order::select('id','total','status')->paginate(5);
        return view('admin.order.index' , compact('orders'));
    }
    function destroy(string $id){
        Order::where('id', $id)->delete();
        return back()->with('success', 'Order deleted successfully');
    }
}

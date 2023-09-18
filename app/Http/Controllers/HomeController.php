<?php
namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Branch;
use App\Models\Cart;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\InformationContact;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\SellingFeature;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class HomeController extends Controller
@@ -34,6 +37,9 @@ function index()
        $product_count = Product::count('id');
        $tag_count = Tag::count('id');
        $faq_count = Faq::count('id');
        $order_count = Order::count('id');
        $cart_count = Cart::count('id');
        $wishlist_count = Wishlist::count('id');
        return view('admin.layout', compact(
            'user_count',
            'admin_count',
@@ -47,6 +53,9 @@ function index()
            "product_count",
            "tag_count",
            "faq_count",
            "order_count",
            "cart_count",
            "wishlist_count",
        ));
    }
}

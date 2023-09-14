<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Branch;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\InformationContact;
use App\Models\Message;
use App\Models\Product;
use App\Models\SellingFeature;
use App\Models\Slider;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $user_count = User::where('type', 'user')
            ->count('id');
        $admin_count = User::where('type', 'admin')
            ->count('id');
        $slider_count = Slider::count('id');
        $banner_count = Banner::count('id');
        $branch_count = Branch::count('id');
        $information_contact_count = InformationContact::count('id');
        $message_count = ContactMessage::count('id');
        $selling_feature_count = SellingFeature::count('id');
        $category_count = Category::count('id');
        $product_count = Product::count('id');
        $tag_count = Tag::count('id');
        $faq_count = Faq::count('id');
        return view('admin.layout', compact(
            'user_count',
            'admin_count',
            'slider_count',
            "branch_count",
            'banner_count',
            "information_contact_count",
            "message_count",
            "selling_feature_count",
            "category_count",
            "product_count",
            "tag_count",
            "faq_count",
        ));
    }
}

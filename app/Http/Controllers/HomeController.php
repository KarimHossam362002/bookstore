<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Branch;
use App\Models\InformationContact;
use App\Models\Message;
use App\Models\SellingFeature;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $user_count=User::where('type','user')
        ->count('id');
        $slider_count=Slider::count('id');
        $banner_count=Banner::count('id');
        $branch_count=Branch::count('id');
        $information_contact_count=InformationContact::count('id');
        $message_count=Message::count('id');
        $selling_feature_count=SellingFeature::count('id');
        return view('admin.layout',compact('user_count','slider_count'
    ,"branch_count",'banner_count',"information_contact_count","message_count","selling_feature_count"));
    }
}

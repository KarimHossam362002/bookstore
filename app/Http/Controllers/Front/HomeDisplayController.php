<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeDisplayController extends Controller
{
    function index(){
        $sliders = Slider::select('image','status')->get();
        $banners = Banner::select('image','status')->get();
        return view('index.index' , compact(['sliders','banners']));
    }
}

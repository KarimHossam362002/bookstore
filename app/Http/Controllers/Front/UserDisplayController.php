<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserDisplayController extends Controller
{
    function index(){
        $users = User::select('id', 'name', 'email','email_verified_at',"type", "image")
        ->where('type','user')
        ->paginate(10);
        return view('admin.user_dashboard.index',compact('users'));
    }
}

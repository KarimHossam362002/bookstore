<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDisplayController extends Controller
{
    function index(){
        $users = User::select('id', 'name', 'email','email_verified_at',"type", "image")
        ->where('type','admin')
        ->paginate(10);
        return view('admin.admin_dashboard.index',compact('users'));
    }
}

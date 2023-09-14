<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id', 'name', 'email','email_verified_at',"type", "image")
        ->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $request->validate(['image' => 'required']);
        $ext = $request->image->extension();
        $newName = 'User' . time() . rand(0, mt_getrandmax()) . '.' . $ext;
        $request->image->move(public_path('assets/images/users'), $newName);
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "type" => $request->type,
            "image" => $newName
        ]);
        return back()->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $request->validate(['image' => 'sometimes']);
        if ($request->hasFile('image')) {

            $ext = $request->image->extension();
            $newName = "User" . time() . rand(0, mt_getrandmax()) . '.' . $ext;
            $request->image->move(public_path('assets/images/users'), $newName);
        }
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "type" => $request->type,
            "image" => $newName ?? $request->image
        ]);
        return redirect()->route('users.index')->with('updated','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return back()->with('success', "Data deleted successfully");
    }
}

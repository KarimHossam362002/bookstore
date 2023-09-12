<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::select('id','image','status')
        ->paginate(5);
        return view('admin.banner.index' ,compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {
        $request->validate(['image'=>'required']);
        $ext = $request->image->extension();
        $newName = 'Banner'.time().rand(0,mt_getrandmax()). '.'.$ext;
        $request->image->move(public_path('assets/images/banners'),$newName);


        Banner::create([
            'image' => $newName,
            'status' => $request->status
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
    public function edit(Banner $banner)
    {
        return view('admin.banner.update' ,compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, Banner $banner)
    {

        $request->validate([
            'image' => 'sometimes',
        ]);
        if($request->hasFile('image')){

            $ext = $request->image->extension();
            $newName = "Banner".time() . rand(0, mt_getrandmax()) . '.' . $ext;
            $request->image->move(public_path('assets/images/banners'), $newName);
        }
        $banner->update([
            'id' => $request->id,
            'image'=> $newName ?? $request->image,
            'status' => $request->status

        ]);
        return redirect()->route('banners.index')->with('updated','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Banner::where('id',$id)->delete();
        return back()->with('success','Data deleted successfully');
    }
}

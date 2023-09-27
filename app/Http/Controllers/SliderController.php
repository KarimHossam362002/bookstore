<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::select('id','image','status')
        ->paginate(5);
        return view('admin.slider.index' ,compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        $request->validate(['image'=>'required']);
        $ext = $request->image->extension();
        $newName = 'Slider'.time().rand(0,mt_getrandmax()). '.'.$ext;
        $request->image->move(public_path('assets/images/sliders'),$newName);


        Slider::create([
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
    public function edit(Slider $slider)
    {
        return view('admin.slider.update' ,compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $request->validate([
            'image' => 'sometimes',
        ]);
        if($request->hasFile('image')){

            $ext = $request->image->extension();
            $newName = "Slider".time() . rand(0, mt_getrandmax()) . '.' . $ext;
            $request->image->move(public_path('assets/images/sliders'), $newName);
        }
        $slider->update([
            'id' => $request->id,
            'image'=> $newName ?? $request->image,
            'status' => $request->status

        ]);
        return redirect()->route('sliders.index')->with('updated','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Slider::where('id',$id)->delete();
        return back()->with('success','Data deleted successfully');
    }
}

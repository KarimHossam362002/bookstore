<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellingFeatureRequest;
use App\Models\SellingFeature;
use Illuminate\Http\Request;

class SellingFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellings = SellingFeature::select('id','feature_title','feature_description')
        ->paginate(5);
        return view('admin.selling.index' ,compact('sellings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.selling.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SellingFeatureRequest $request)
    {
        SellingFeature::create([
            'feature_title'=> $request->feature_title,
            'feature_description'=> $request->feature_description,
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
    public function edit(SellingFeature $selling)
    {
        return view('admin.selling.update' , compact('selling'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SellingFeatureRequest $request, SellingFeature $selling)
    {
        $selling->update([
            'feature_title' => $request->feature_title,
            'feature_description' => $request->feature_description,
        ]);
        return redirect()->route('sellings.index')->with('updated','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SellingFeature::where('id',$id)->delete();
        return back()->with('success',"Data deleted successfully");
    }
}

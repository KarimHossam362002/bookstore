<?php

namespace App\Http\Controllers;

use App\Models\SellingFeature;
use Illuminate\Http\Request;

class SellingFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellings = SellingFeature::select('id','feature_title','feature_description');
        return view('admin.selling.index' ,compact('sellings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

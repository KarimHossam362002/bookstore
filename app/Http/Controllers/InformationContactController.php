<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformationRequest;
use App\Models\InformationContact;
use Illuminate\Http\Request;

class InformationContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info_contacts = InformationContact::paginate(5);
        return view('admin.information.index',compact('info_contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.information.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InformationRequest $request)
    {
        InformationContact::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'technical_support_address' => $request->technical_support_address,
            'ongoing_support_address' => $request->ongoing_support_address,
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
    public function edit(InformationContact $information)
    {
       
        return view('admin.information.update' ,compact('information'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InformationRequest $request, InformationContact $information)
    {

        $information->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'technical_support_address' => $request->technical_support_address,
            'ongoing_support_address' => $request->ongoing_support_address,
        ]);
        redirect()->route('informations.index')->with('updated','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        InformationContact::where('id',$id)->delete();
        return back()->with('success',"Data deleted successfully");
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use App\Models\Product;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::select('id');
        $faqs = Faq::select('id','question','answer','product_id')
        ->paginate(5);
        return view('admin.faq.index',compact('products', 'faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::get();
        return view('admin.faq.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        Faq::create([
            "question" => $request->question,
            "answer" => $request->answer,
            "product_id" => $request->product_id
        ]);
        return back()->with('success',"Data created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        $products = Product::get();
        return view('admin.faq.update', compact('products','faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request, Faq $faq)
    {

        $faq->update([
            "question" => $request->question,
            "answer" => $request->answer,
            "product_id" => $request->product_id
        ]);
        return redirect()->route('faqs.index')->with('updated',"Data updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Faq::where('id',$id)->delete();
        return redirect()->route('faqs.index')->with('success',"Data deleted successfully");
    }
}

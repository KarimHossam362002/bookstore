<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::select('id', 'title', "author","pages_num", "price", "quantity")
            ->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
            "pages_num" => $request->pages_num,
            "price" => $request->price,
            "discount" => $request->discount,
            "quantity" => $request->quantity,
            "product_code" => $request->product_code
            // Here must be a category title in create a product
        ]);
        $product->categories()->sync($request->input('category_id'));
        return back()->with('success',"Data created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // $product = Product::select('id','title','author','description', 'product_code' ,'category_id')
        //     ->paginate(5);
        $products = Product::select('id','title','author','description',"price","discount", 'product_code')
            ->paginate(5);
        return view('admin.product.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update([
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
            "pages_num" => $request->pages_num,
            "price" => $request->price,
            "discount" => $request->discount,
            "quantity" => $request->quantity,
            "product_code" => $request->product_code
        ]);
        $product->categories()->sync($request->input('category_id'));
        return redirect()->route('products.index')->with('updated', "Data updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::where('id', $id)->delete();
        return back()->with('success', 'Data deleted successfully');
    }
}

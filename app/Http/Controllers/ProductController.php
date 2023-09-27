<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::select('id', 'title', "author", "pages_num", "price", "quantity", 'available')
            ->paginate(5);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id','title')->get();
        return view('admin.product.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->validate(['image' => 'required']);
        $ext = $request->image->extension();
        $newName = 'Product' . time() . rand(0, mt_getrandmax()) . '.' . $ext;
        $request->image->move(public_path('assets/images/products'), $newName);
        // dd($request->category_id);
         Product::create([
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
            "pages_num" => $request->pages_num,
            "price" => $request->price,
            "discount" => $request->discount,
            "price_after_discount" => $request->price_after_discount,
            "quantity" => $request->quantity,
            "product_code" => $request->product_code,
            "available" => $request->available,
            "image" => $newName,
            "category_id" => $request->category_id,
            // Here must be a category title in create a product
        ]);
        // $product->categories()->sync($request->input('category_id'));
        return back()->with('success', "Data created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // $categories = Category::get();
        // $product = Product::select('id','title','author','description', 'product_code' ,'category_id')
        //     ->paginate(5);
        // $products = Product::select('id', 'title', 'author', 'description', "price", "discount", 'product_code', 'available', "image", "category_id")
        //     ->paginate(5);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('admin.product.update', compact('product', "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $defaultProduct = asset('assets/images/products/defaultProduct.png');
        if ($request->hasFile('image')) {
            $request->validate(['image' => 'sometimes']);
            $ext = $request->image->extension();
            $newName = 'Product' . time() . rand(0, mt_getrandmax()) . '.' . $ext;
            $request->image->move(public_path('assets/images/products'), $newName);
        }
        $product->update([
            "title" => $request->title,
            "description" => $request->description,
            "author" => $request->author,
            "pages_num" => $request->pages_num,
            "price" => $request->price,
            "discount" => $request->discount,
            "price_after_discount" => $request->price_after_discount,
            "quantity" => $request->quantity,
            "product_code" => $request->product_code,
            "available" => $request->available,
            "image" => $newName ?? $defaultProduct,
            "category_id" => $request->category_id,
        ]);
        // $product->categories()->sync($request->input('category_id'));
        return redirect()->route('products.index')->with('updated', "Data updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::where('id', $id)->delete();
        return redirect()->route('products.index')->with('success', 'Data deleted successfully');
    }
}

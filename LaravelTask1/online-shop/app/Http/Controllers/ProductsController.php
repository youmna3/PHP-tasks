<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        //
        $products = Product::paginate(5);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('admin.products.create', compact('categories', 'sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(Product::$rules);
        $imageUrl = $request->file('image')->store('products', ['disk' => 'public']);
        $product = new Product;
        $product->fill($request->post());
        $product['image'] = $imageUrl;
        $product['is_recent'] = isset($request['is_recent']) ? 1 : 0;
        $product['is_featured'] = isset($request['is_featured']) ? 1 : 0;
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sizes = Size::all();
        $colors = color::all();
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product', 'categories', 'sizes', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::findOrFail($id);
        $request->validate(Product::$rules);
        $imageUrl = $request->file('image')->store('products', ['disk' => 'public']);
        $product->fill($request->post());
        $product['image'] = $imageUrl;
        $product['is_recent'] = isset($request['is_recent']) ? 1 : 0;
        $product['is_featured'] = isset($request['is_featured']) ? 1 : 0;
        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        Product::destroy($id);
        return redirect()->route('products.index')->with('success', 'Record has been deleted successfully!');
    }
}
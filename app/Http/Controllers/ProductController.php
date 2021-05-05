<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Fabric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // products
        $products = Product::get();
        
        // colors 
        $colors = Color::get();

        return view('pages.products.index', compact('products', 'colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // categories
        $categories = Category::get();

        // colors 
        $colors = Color::get();

        // fabrics 
        $fabrics = Fabric::get();

        return view('pages.products.form', compact('categories', 'colors', 'fabrics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
	        $params['image'] = $request->file('image')->store('products');
        }

        $product = Product::create($params);
        
        if ($request->input('colors')) :
            $product->colors()->attach($request->input('colors'));
        endif;

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // categories
        $categories = Category::get();

        // colors 
        $colors = Color::get();

        // fabrics 
        $fabrics = Fabric::get();

        return view('pages.products.form', compact('product', 'categories', 'colors', 'fabrics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($product->image);
            $params['image'] = $request->file('image')->store('products');
        }
        
        $product->update($params);

        $product->colors()->detach();
        if ($request->input('colors')) :
            $product->colors()->attach($request->input('colors'));
        endif;

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->colors()->detach();
        $product->delete();
        Storage::delete($product->image);
        return redirect()->route('products.index');
    }
}

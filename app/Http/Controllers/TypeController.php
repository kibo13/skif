<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Product;
use App\Models\Fabric;
use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        // products
        $types = Type::where('product_id', $product->id)->get();

        return view('pages.colors.index', compact('types', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        // plates
        $plates = Plate::get();

        // fabrics
        $fabrics = Fabric::get();

        return view(
            'pages.colors.form', 
            compact('product', 'plates', 'fabrics')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
	        $params['image'] = $request->file('image')->store('products');
        }

        Type::create($params);
        return redirect()->route('products.types', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Type $type)
    {
        // plates
        $plates = Plate::get();

        // fabrics
        $fabrics = Fabric::get();

        return view(
            'pages.colors.form', 
            compact('product', 'type', 'plates', 'fabrics')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, Type $type)
    {
        $params = $request->all();
        unset($params['image']);
        if ($request->has('image')) {
            Storage::delete($type->image);
            $params['image'] = $request->file('image')->store('products');
        }
        
        $type->update($params);
        return redirect()->route('products.types', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Type $type)
    {
        $type->delete();
        Storage::delete($type->image);
        return redirect()->route('products.types', $product);
    }
}

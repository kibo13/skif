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
  // products.types
  public function index(Product $product)
  {
    // products
    $types = Type::where('product_id', $product->id)->get();

    return view('pages.types.index', compact('types', 'product'));
  }

  // products.types.create
  public function create(Product $product)
  {
    // plates
    $plates = Plate::get();

    // fabrics
    $fabrics = Fabric::get();

    return view(
      'pages.types.form',
      compact('product', 'plates', 'fabrics')
    );
  }

  // products.types.store
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

  // products.types.edit
  public function edit(Product $product, Type $type)
  {
    // plates
    $plates = Plate::get();

    // fabrics
    $fabrics = Fabric::get();

    return view(
      'pages.types.form',
      compact('product', 'type', 'plates', 'fabrics')
    );
  }

  // products.types.update
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

  // products.types.destroy
  public function destroy(Product $product, Type $type)
  {
    $type->delete();
    Storage::delete($type->image);
    return redirect()->route('products.types', $product);
  }
}

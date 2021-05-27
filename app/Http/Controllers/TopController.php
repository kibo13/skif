<?php

namespace App\Http\Controllers;

use App\Models\Top;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopController extends Controller
{
  // products.tops
  public function index(Product $product)
  {
    // type of products
    $tops = Top::where('product_id', $product->id)->get();

    return view('pages.tops.index', compact('tops', 'product'));
  }

  // products.tops.create
  public function create(Product $product)
  {
    return view('pages.tops.form', compact('product'));
  }

  // products.tops.store
  public function store(Request $request, Product $product)
  {
    $params = $request->all();
    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('products');
    }

    Top::create($params);
    return redirect()->route('products.tops', $product);
  }

  // products.tops.edit
  public function edit(Product $product, Top $top)
  {
    return view('pages.tops.form', compact('product', 'top'));
  }

  // products.tops.update
  public function update(Request $request, Product $product, Top $top)
  {
    $params = $request->all();
    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($top->image);
      $params['image'] = $request->file('image')->store('products');
    }

    $top->update($params);
    return redirect()->route('products.tops', $product);
  }

  // products.tops.destroy
  public function destroy(Product $product, Top $top)
  {
    $top->delete();
    Storage::delete($top->image);
    return redirect()->route('products.tops', $product);
  }
}

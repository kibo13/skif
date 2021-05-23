<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  // products.index
  public function index()
  {
    // products
    $products = Product::get();

    return view('pages.products.index', compact('products'));
  }

  // products.create
  public function create()
  {
    // categories
    $categories = Category::get();

    return view('pages.products.form', compact('categories'));
  }

  // products.store
  public function store(Request $request)
  {
    Product::create($request->all());
    return redirect()->route('products.index');
  }

  // products.edit
  public function edit(Product $product)
  {
    // categories
    $categories = Category::get();

    return view('pages.products.form', compact('product', 'categories'));
  }

  // products.update
  public function update(Request $request, Product $product)
  {
    $product->update($request->all());
    return redirect()->route('products.index');
  }

  // products.destroy
  public function destroy(Product $product)
  {
    $product->delete();
    return redirect()->route('products.index');
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  // home
  public function index(Request $request)
  {
    // categories
    $categories = Category::get();

    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    // product query
    $product_query = Product::query();

    dd($request);

    if ($request->filled('categories')) {
      $product_query->where('category_id', '==', $request['categories']);
    }

    $products = $product_query->get();

    return view('home', compact('categories', 'order', 'products'));
  }
}

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
    // session for order
    $order_id = session('order_id');

    // get order by order_id
    $order = Order::find($order_id);

    // get all categories
    $categories = Category::get();

    // category_id from request 
    $category_id = $request['categories'];

    // get all products
    if ($category_id == 0) {
      session(['category_id' => 0]);
      $products = Product::get();
    }
    // get all products by category
    else {
      session(['category_id' => $category_id]);
      $products = Product::where('category_id', $category_id)->get();
    }

    return view('home', compact('order', 'categories', 'category_id', 'products'));
  }
}

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
    // create session for order
    $order_id = session('order_id');

    // get order by order_id
    $order = Order::find($order_id);

    // get all categories
    $categories = Category::get();

    // current category id
    $current_id = $request['categories'];

    // old category id
    $old_id = 0;

    // create session for category
    $category_id = session('categ_id');
    session(['categ_id' => $current_id]);

    // add current category to session
    // if ($category_id == null) {
    //   $old_id = $request['categories'];
    //   session(['categ_id' => $current_id]);
    // }
    // // add new category to session
    // else {
    //   if ($old_id != $current_id) {
    //     session(['categ_id' => $current_id]);
    //   }
    // }

    // get all products
    if ($category_id == 0) {
      $products = Product::get();
    }
    // get all products by category
    else {
      $products = Product::where('category_id', $category_id)->get();
    }

    return view('home', compact('order', 'categories', 'category_id', 'products'));
  }
}

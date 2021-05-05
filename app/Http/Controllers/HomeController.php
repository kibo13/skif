<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // session 
        $order_id = session('order_id');

        // order
        $order = Order::find($order_id);

        // categories 
        $categories = Category::get();

        // products 
        $products = Product::get();

        return view('home', compact('products', 'order'));
    }
}

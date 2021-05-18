<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  // general order page
  public function index()
  {
    // orders
    $orders = Order::where('state', '>', 0)->get();

    // total number of orders
    $total = Order::count();

    // number of orders placed
    // number of orders in progress
    // number of completed orders

    return view('pages.orders.index', compact('orders', 'total'));
  }

  // order confirmation form
  public function create(Request $request)
  {
    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    // customers
    $customers = Customer::get();

    if ($order == null || $order->getFullPrice() == 0) {
      return redirect()->route('home');
    }

    return view('pages.orders.confirm', compact('order', 'customers'));
  }

  // order creation
  public function store(Request $request, $order_id)
  {
    // order
    $order = Order::find($order_id);

    // store order
    $order->update($request->all());

    // clear session
    session()->forget('order_id');

    return redirect()->route('orders.index');
  }

  // order details
  public function show(Order $order)
  {
    return view('pages.orders.detail', compact('order'));
  }

  // deleting an order
  public function destroy(Order $order)
  {
    $order->delete();
    return redirect()->route('orders.index');
  }
}

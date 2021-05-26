<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  // orders.index
  public function index()
  {
    // orders
    $orders = Order::where('state', '>', 0)->get();

    // total number of orders
    $total = Order::where('state', '>', 0)->count();

    // orders are progress
    $progress = Order::where('state', '=', 1)->count();

    // orders are complete
    $complete = Order::where('state', '=', 2)->count();

    return view('pages.orders.index', compact('orders', 'total', 'progress', 'complete'));
  }

  // home.orders.create
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

  // home.orders.store
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

  // orders.details
  public function edit(Order $order)
  {
    return view('pages.orders.form', compact('order'));
  }

  // orders.update
  public function update(Request $request, Order $order)
  {
    $order->update($request->all());
    return redirect()->route('orders.index');
  }

  // orders.destroy
  public function destroy(Order $order)
  {
    $order->delete();
    return redirect()->route('orders.index');
  }
}

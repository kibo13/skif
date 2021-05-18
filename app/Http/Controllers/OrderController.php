<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
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

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
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

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, $order_id)
  {
    // order
    $order = Order::find($order_id);

    dd($request->all());

    // store order
    $order->update($request->all());

    // clear session
    session()->forget('order_id');

    return redirect()->route('orders.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function show(Order $order)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function edit(Order $order)
  {
    // customers
    $customers = Customer::get();

    return view('pages.orders.form', compact('order', 'customers'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Order $order)
  {
    $order->update($request->all());
    return redirect()->route('orders.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Order  $order
   * @return \Illuminate\Http\Response
   */
  public function destroy(Order $order)
  {
    $order->delete();
    return redirect()->route('orders.index');
  }
}

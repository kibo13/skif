<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
  // basket page
  public function index()
  {
    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    return view('basket', compact('order'));
  }

  // create multiple items
  public function create(Request $request)
  {
    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    // type of product
    $top_id = $request['top_id'];

    // order doesn't exist
    if (is_null($order)) {
      $order = Order::create();
      session(['order_id' => $order->id]);
    }

    // order exists with top_id
    if ($order->tops->contains($top_id)) {
      $top = $order->tops()->where('top_id', $top_id)->first();
      $top->pivot->count = $request['count'];
      $top->pivot->update();
    }
    // order doesn't exists with type_id
    else {
      $order->tops()->attach($top_id, ['count' => $request['count']]);
    }

    return redirect()->back();
  }

  // create one item
  public function addItem($top)
  {
    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    // type of product 
    $top = $order->tops()->where('top_id', $top)->first();
    $top->pivot->count++;
    $top->pivot->update();

    return redirect()->route('home.basket.index');
  }

  // delete one item
  public function delItem($top)
  {
    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    // type of product 
    $top = $order->tops()->where('top_id', $top)->first();

    if ($top->pivot->count < 2) {
      $order->tops()->detach($top);
    } else {
      $top->pivot->count--;
      $top->pivot->update();
    }

    return redirect()->route('home.basket.index');
  }
}

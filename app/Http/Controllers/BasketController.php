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

    // type_id
    $type_id = $request['type_id'];

    // order doesn't exist
    if (is_null($order)) {
      $order = Order::create();
      session(['order_id' => $order->id]);
    }

    // order exists with type_id
    if ($order->types->contains($type_id)) {
      $type = $order->types()->where('type_id', $type_id)->first();
      $type->pivot->count = $request['count'];
      $type->pivot->update();
    }
    // order doesn't exists with type_id
    else {
      $order->types()->attach($type_id, ['count' => $request['count']]);
    }

    return redirect()->route('home');
  }

  // create one item
  public function addItem($type)
  {
    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    // type
    $type = $order->types()->where('type_id', $type)->first();
    $type->pivot->count++;
    $type->pivot->update();

    return redirect()->route('home.basket.index');
  }

  // delete one item
  public function delItem($type)
  {
    // session
    $order_id = session('order_id');

    // order
    $order = Order::find($order_id);

    // type
    $type = $order->types()->where('type_id', $type)->first();

    if ($type->pivot->count < 2) {
      $order->types()->detach($type);
    } else {
      $type->pivot->count--;
      $type->pivot->update();
    }

    return redirect()->route('home.basket.index');
  }
}

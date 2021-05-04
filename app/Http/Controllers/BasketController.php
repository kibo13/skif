<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index() 
    {
        $order_id = session('order_id');

        if (!is_null($order_id)) {
            $order = Order::findOrFail($order_id);
        }

        return view('basket', compact('order'));
    }

    public function create($product) 
    {
        $order_id = session('order_id');

        if (is_null($order_id)) {
            $order = Order::create();
            session(['order_id' => $order->id]);
        } else {
            $order = Order::find($order_id);
        }

        if ($order->products->contains($product)) {
            $pivotRow = $order->products()->where('product_id', $product)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($product);
        }          

        return redirect()->route('basket.index');
    }

    public function destroy($product) 
    {
        $order_id = session('order_id');

        if (is_null($order_id)) {
            return redirect()->route('basket.index');
        }

        $order = Order::find($order_id);

        if ($order->products->contains($product)) {
            $pivotRow = $order->products()->where('product_id', $product)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($product);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }   

        return redirect()->route('basket.index');
    }
}

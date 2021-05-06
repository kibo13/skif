<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    // basket page 
    public function index() 
    {
        $order_id = session('order_id');

        if (!is_null($order_id)) {
            $order = Order::findOrFail($order_id);
        }

        return view('basket', compact('order'));
    }

    // create multiple items
    public function create(Request $request, $product) 
    {
        $order_id = session('order_id');      
        $order = Order::find($order_id);

        if (is_null($order)) {
            $order_new = Order::create();
            session(['order_id' => $order_new->id]);
        } else {
            if ($order->state > 0) {
                $order_new = Order::create();
                session(['order_id' => $order_new->id]);
            }
        }

        if ($order->products->contains($product)) {
            $pivot_row = $order->products()->where('product_id', $product)->first()->pivot;
            $pivot_row->count = $request['count'];
            $pivot_row->update();
        } else {
            $order->products()->attach($product, ['count' => $request['count']]);
        }        

        return redirect()->route('home');
    }

    // create one item 
    public function addItem($product) 
    {
        $order_id = session('order_id');

        if (is_null($order_id)) {
            return redirect()->route('basket.index');
        }

        $order = Order::find($order_id);

        if ($order->products->contains($product)) {
            $pivotRow = $order->products()->where('product_id', $product)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->attach($product);
            } else {
                $pivotRow->count++;
                $pivotRow->update();
            }
        }   

        return redirect()->route('basket.index');
    }

    // delete one item 
    public function delItem($product)
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

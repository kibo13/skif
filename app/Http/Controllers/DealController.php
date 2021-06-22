<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Purchase;
use Illuminate\Http\Request;

class DealController extends Controller
{
  // deals.index
  public function index()
  {
    // purchases
    $purchases = Purchase::where('state', '>', 0)->get();

    // total number of statements
    $total = Purchase::where('state', '>', 0)->count();

    // orders are progress
    $progress = Purchase::where('state', '=', 1)->count();

    // orders are complete
    $complete = Purchase::where('state', '=', 2)->count();

    return view('pages.deals.index', compact('purchases', 'total', 'progress', 'complete'));
  }

  // deals.edit
  public function edit(Purchase $purchase)
  {
    // suppliers 
    $suppliers = Supplier::get();

    return view('pages.deals.form', compact('purchase', 'suppliers'));
  }

  // deals.update
  public function update(Request $request, Purchase $purchase)
  {
    $purchase->update($request->all());
    return redirect()->route('deals.index');
  }
}

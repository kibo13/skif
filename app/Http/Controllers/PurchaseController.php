<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
  // purchases.index
  public function index()
  {
    $purchases = Purchase::get();
    return view('pages.purchases.index', compact('purchases'));
  }

  // purchases.create
  public function create()
  {
    // session
    $purchase_id = session('purchase_id');

    // purchase
    $purchase = Purchase::find($purchase_id);

    // purchase doesn't exist
    if (is_null($purchase)) {
      $purchase = Purchase::create([
        'code' => getCode(),
        'date_p' => getCurrentDay(),
        'user_id' => Auth::user()->id
      ]);
      session(['purchase_id' => $purchase->id]);
    }

    return view('pages.purchases.form', compact('purchase'));
  }

  // purchases.complete
  public function complete(Purchase $purchase)
  {
    // purchase 
    $purchase->state = 1;
    $purchase->save();

    // clear session
    session()->forget('purchase_id');

    return redirect()->route('purchases.index');
  }

  // purchases.show
  public function show(Purchase $purchase)
  {
    return view('pages.purchases.show', compact('purchase'));
  }

  // purchases.edit
  public function edit(Purchase $purchase)
  {
    return view('pages.purchases.form', compact('purchase'));
  }

  // purchases.update
  public function update(Request $request, Purchase $purchase)
  {
    $purchase->update($request->all());
    return redirect()->route('purchases.index');
  }

  // purchases.destroy
  public function destroy(Purchase $purchase)
  {
    $purchase->delete();
    return redirect()->route('purchases.index');
  }
}

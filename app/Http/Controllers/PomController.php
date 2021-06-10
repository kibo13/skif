<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Pom;
use Illuminate\Http\Request;

class PomController extends Controller
{
  // purchases.poms.create
  public function create(Request $request)
  {
    // purchase
    $purchase = Purchase::find($request['purchase_id']);

    // material and color 
    $material = $request['material_id'];
    $color = $request['color_id'];

    // purchase of material 
    $pom = $purchase->poms()->where('material_id', $material)->where('color_id', $color)->first();

    // purchase hasn't materials 
    if (is_null($pom)) {
      Pom::create($request->all());
    }
    // purchase has materials 
    else {
      $pom->update($request->all());
    }

    return redirect()->back();
  }

  // purchases.poms.clear
  public function clear(Pom $pom)
  {
    $pom->delete();
    return redirect()->back();
  }
}

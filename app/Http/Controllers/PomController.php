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
    Pom::create($request->all());
    return redirect()->route('purchases.create');
  }
}

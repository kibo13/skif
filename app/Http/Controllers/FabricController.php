<?php

namespace App\Http\Controllers;

use App\Models\Fabric;
use Illuminate\Http\Request;

class FabricController extends Controller
{
  public function create()
  {
    return view('pages.colors.fabric');
  }

  public function store(Request $request)
  {
    Fabric::create($request->all());
    return redirect()->route('colors.index');
  }

  public function edit(Fabric $fabric)
  {
    return view('pages.colors.fabric', compact('fabric'));
  }

  public function update(Request $request, Fabric $fabric)
  {
    $fabric->update($request->all());
    return redirect()->route('colors.index');
  }

  public function destroy(Fabric $fabric)
  {
    $fabric->delete();
    return redirect()->route('colors.index');
  }
}

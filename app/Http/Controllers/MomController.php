<?php

namespace App\Http\Controllers;

use App\Models\Mom;
use App\Models\Movement;
use App\Models\Material;

use Illuminate\Http\Request;

class MomController extends Controller
{
  // movements.moms
  public function index(Movement $movement)
  {
    // movement of materials
    $moms = Mom::where('movement_id', $movement->id)->get();

    return view('pages.moms.index', compact('moms', 'movement'));
  }

  // movements.moms.create
  public function create(Movement $movement)
  {
    // materials 
    $materials = Material::get();

    // measures 
    $measures = config('constants.measures');

    return view('pages.moms.form', compact('movement', 'materials', 'measures'));
  }

  // movements.moms.store
  public function store(Request $request, Movement $movement)
  {
    dd($request->all());
    Mom::create($request->all());
    return redirect()->route('movements.moms', $movement);
  }

  // movements.moms.edit
  public function edit(Movement $movement, Mom $mom)
  {
    // materials 
    $materials = Material::get();

    // measures 
    $measures = config('constants.measures');

    return view('pages.moms.form', compact('movement', 'mom', 'materials', 'measures'));
  }

  // movements.moms.update
  public function update(Request $request, Movement $movement, Mom $mom)
  {
    $mom->update($request->all());
    return redirect()->route('movements.moms', $movement);
  }

  // movements.moms.destroy
  public function destroy(Movement $movement, Mom $mom)
  {
    $mom->delete();
    return redirect()->route('movements.moms', $movement);
  }
}

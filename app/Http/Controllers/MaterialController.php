<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Color;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
  // materials.index
  public function index()
  {
    $materials = Material::get();
    return view('pages.materials.index', compact('materials'));
  }

  // materials.create
  public function create()
  {
    // type of materials
    $toms = config('constants.type_material');

    // colors 
    $colors = Color::get();

    return view('pages.materials.form', compact('toms', 'colors'));
  }

  // materials.store
  public function store(Request $request)
  {
    $material = Material::create($request->all());

    if ($request->input('colors')) :
      $material->colors()->attach($request->input('colors'));
    endif;

    return redirect()->route('materials.index');
  }

  // materials.edit
  public function edit(Material $material)
  {
    // type of materials
    $toms = config('constants.type_material');

    // colors 
    $colors = Color::get();

    return view('pages.materials.form', compact('material', 'toms', 'colors'));
  }

  // materials.update
  public function update(Request $request, Material $material)
  {
    $material->update($request->all());

    $material->colors()->detach();
    if ($request->input('colors')) :
      $material->colors()->attach($request->input('colors'));
    endif;

    $material->save();

    return redirect()->route('materials.index');
  }

  // materials.destroy
  public function destroy(Material $material)
  {
    $material->colors()->detach();
    $material->delete();

    return redirect()->route('materials.index');
  }
}

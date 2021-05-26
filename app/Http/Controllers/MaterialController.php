<?php

namespace App\Http\Controllers;

use App\Models\Material;
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
    return view('pages.materials.form');
  }

  // materials.store
  public function store(Request $request)
  {
    Material::create($request->all());
    return redirect()->route('materials.index');
  }

  // materials.edit
  public function edit(Material $material)
  {
    return view('pages.materials.form', compact('material'));
  }

  // materials.update
  public function update(Request $request, Material $material)
  {
    $material->update($request->all());
    return redirect()->route('materials.index');
  }

  // materials.destroy
  public function destroy(Material $material)
  {
    $material->delete();
    return redirect()->route('materials.index');
  }
}

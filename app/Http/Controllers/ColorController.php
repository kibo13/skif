<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ColorController extends Controller
{
  // colors.index
  public function index()
  {
    $colors = Color::get();
    return view('pages.colors.index', compact('colors'));
  }

  // colors.create
  public function create()
  {
    return view('pages.colors.form');
  }

  // colors.store
  public function store(Request $request)
  {
    $params = $request->all();
    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('colors');
    }

    Color::create($params);
    return redirect()->route('colors.index');
  }

  // colors.edit
  public function edit(Color $color)
  {
    return view('pages.colors.form', compact('color'));
  }

  // colors.update
  public function update(Request $request, Color $color)
  {
    $params = $request->all();
    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($color->image);
      $params['image'] = $request->file('image')->store('colors');
    }

    $color->update($params);
    return redirect()->route('colors.index');
  }

  // colors.destroy
  public function destroy(Color $color)
  {
    $color->delete();
    Storage::delete($color->image);
    return redirect()->route('colors.index');
  }
}

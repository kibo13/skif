<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{
  public function create()
  {
    return view('pages.colors.plate');
  }

  public function store(Request $request)
  {
    $params = $request->all();
    unset($params['image']);
    if ($request->has('image')) {
      $params['image'] = $request->file('image')->store('plates');
    }

    Plate::create($params);
    return redirect()->route('colors.index');
  }

  public function edit(Plate $plate)
  {
    return view('pages.colors.plate', compact('plate'));
  }

  public function update(Request $request, Plate $plate)
  {
    $params = $request->all();
    unset($params['image']);
    if ($request->has('image')) {
      Storage::delete($plate->image);
      $params['image'] = $request->file('image')->store('plates');
    }

    $plate->update($params);
    return redirect()->route('colors.index');
  }

  public function destroy(Plate $plate)
  {
    $plate->delete();
    Storage::delete($plate->image);
    return redirect()->route('colors.index');
  }
}

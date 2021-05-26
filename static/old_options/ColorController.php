<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use App\Models\Fabric;

class ColorController extends Controller
{
  // colors.index
  public function index()
  {
    // plates
    $plates = Plate::get();

    // fabrics
    $fabrics = Fabric::get();

    return view('pages.colors.index', compact('plates', 'fabrics'));
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use App\Models\Fabric;

class MaterialController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // plates
    $plates = Plate::get();

    // fabrics
    $fabrics = Fabric::get();

    return view('pages.materials.index', compact('plates', 'fabrics'));
  }
}

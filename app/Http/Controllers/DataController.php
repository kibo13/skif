<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class DataController extends Controller
{
  public function materials()
  {
    // materials 
    $materials = Material::where('tom', '<', 3)->get();

    return $materials;
  }
}

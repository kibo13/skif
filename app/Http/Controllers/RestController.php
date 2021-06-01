<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestController extends Controller
{
  // movements.rests
  public function rests()
  {
    // materials
    $mats = rests();

    return view('pages.movements.rest', compact('mats'));
  }
}

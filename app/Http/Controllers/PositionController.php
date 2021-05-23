<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
  // positions.index
  public function index()
  {
    $positions = Position::get();
    return view('pages.positions.index', compact('positions'));
  }

  // positions.create
  public function create()
  {
    return view('pages.positions.form');
  }

  // positions.store
  public function store(Request $request)
  {
    Position::create($request->all());
    return redirect()->route('positions.index');
  }

  // positions.edit
  public function edit(Position $position)
  {
    return view('pages.positions.form', compact('position'));
  }

  // positions.update
  public function update(Request $request, Position $position)
  {
    $position->update($request->all());
    return redirect()->route('positions.index');
  }

  // positions.destroy
  public function destroy(Position $position)
  {
    $position->delete();
    return redirect()->route('positions.index');
  }
}

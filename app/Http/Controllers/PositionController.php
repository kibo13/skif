<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $positions = Position::get();
    return view('pages.positions.index', compact('positions'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.positions.form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Position::create($request->all());
    return redirect()->route('positions.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Position  $position
   * @return \Illuminate\Http\Response
   */
  public function show(Position $position)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Position  $position
   * @return \Illuminate\Http\Response
   */
  public function edit(Position $position)
  {
    return view('pages.positions.form', compact('position'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Position  $position
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Position $position)
  {
    $position->update($request->all());
    return redirect()->route('positions.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Position  $position
   * @return \Illuminate\Http\Response
   */
  public function destroy(Position $position)
  {
    $position->delete();
    return redirect()->route('positions.index');
  }
}

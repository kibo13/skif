<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\Worker;
use Illuminate\Http\Request;

class MovementController extends Controller
{
  // movements.index
  public function index()
  {
    $movements = Movement::get();
    return view('pages.movements.index', compact('movements'));
  }

  // movements.create
  public function create()
  {
    // type of transactions
    $tots = config('constants.type_transaction');

    // workers with position of master 
    $masters = Worker::where('position_id', 4)->get();

    return view('pages.movements.form', compact('tots', 'masters'));
  }

  // movements.store
  public function store(Request $request)
  {
    Movement::create($request->all());
    return redirect()->route('movements.index');
  }

  // movements.edit
  public function edit(Movement $movement)
  {
    // type of transactions
    $tots = config('constants.type_transaction');

    // workers with position of master 
    $masters = Worker::where('position_id', 4)->get();

    return view('pages.movements.form', compact('movement', 'tots', 'masters'));
  }

  // movements.update
  public function update(Request $request, Movement $movement)
  {
    $movement->update($request->all());
    return redirect()->route('movements.index');
  }

  // movements.destroy
  public function destroy(Movement $movement)
  {
    $movement->delete();
    return redirect()->route('movements.index');
  }
}

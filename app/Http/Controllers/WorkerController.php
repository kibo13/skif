<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\Position;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
  // workers.index
  public function index()
  {
    $workers = Worker::where('firstname', '!=', 'sa')->get();
    return view('pages.workers.index', compact('workers'));
  }

  // workers.create
  public function create()
  {
    $positions = Position::get();
    return view('pages.workers.form', compact('positions'));
  }

  // workers.store
  public function store(Request $request)
  {
    Worker::create($request->all());
    return redirect()->route('workers.index');
  }

  // workers.edit
  public function edit(Worker $worker)
  {
    $positions = Position::get();
    return view('pages.workers.form', compact('worker', 'positions'));
  }

  // workers.update
  public function update(Request $request, Worker $worker)
  {
    $worker->update($request->all());
    return redirect()->route('workers.index');
  }

  // workers.destroy
  public function destroy(Worker $worker)
  {
    $worker->delete();
    return redirect()->route('workers.index');
  }
}

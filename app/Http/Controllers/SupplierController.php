<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
  // suppliers.index
  public function index()
  {
    // suppliers
    $suppliers = Supplier::get();

    return view('pages.suppliers.index', compact('suppliers'));
  }

  // suppliers.create
  public function create()
  {
    return view('pages.suppliers.form');
  }

  // suppliers.store
  public function store(SupplierRequest $request)
  {
    Supplier::create($request->all());
    return redirect()->route('suppliers.index');
  }

  // suppliers.edit
  public function edit(Supplier $supplier)
  {
    return view('pages.suppliers.form', compact('supplier'));
  }

  // suppliers.update
  public function update(SupplierRequest $request, Supplier $supplier)
  {
    $supplier->update($request->all());
    return redirect()->route('suppliers.index');
  }

  // suppliers.destroy
  public function destroy(Supplier $supplier)
  {
    $supplier->delete();
    return redirect()->route('suppliers.index');
  }
}

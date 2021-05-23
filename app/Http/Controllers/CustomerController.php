<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
  // customers.index
  public function index()
  {
    $customers = Customer::get();
    return view('pages.customers.index', compact('customers'));
  }

  // customers.create
  public function create()
  {
    $types = config('constants.type_customer');
    return view('pages.customers.form', compact('types'));
  }

  // customers.store
  public function store(CustomerRequest $request)
  {
    // session
    $order_id = session('order_id');

    // customer creation 
    Customer::create($request->all());

    // session is null 
    if (is_null($order_id)) {
      return redirect()->route('customers.index');
    }

    // session isn't null 
    else {
      return redirect()->route('home.basket.confirm');
    }
  }

  // customers.edit
  public function edit(Customer $customer)
  {
    $types = config('constants.type_customer');
    return view('pages.customers.form', compact('customer', 'types'));
  }

  // customers.update
  public function update(CustomerRequest $request, Customer $customer)
  {
    $customer->update($request->all());
    return redirect()->route('customers.index');
  }

  // customers.destroy
  public function destroy(Customer $customer)
  {
    $customer->delete();
    return redirect()->route('customers.index');
  }
}

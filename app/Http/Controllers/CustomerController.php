<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $customers = Customer::get();
    return view('pages.customers.index', compact('customers'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

    // dd(session('order_id'));
    $types = config('constants.type_customer');
    return view('pages.customers.form', compact('types'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
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

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function show(Customer $customer)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function edit(Customer $customer)
  {
    $types = config('constants.type_customer');
    return view('pages.customers.form', compact('customer', 'types'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function update(CustomerRequest $request, Customer $customer)
  {
    $customer->update($request->all());
    return redirect()->route('customers.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function destroy(Customer $customer)
  {
    $customer->delete();
    return redirect()->route('customers.index');
  }
}

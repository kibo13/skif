<?php

namespace App\Http\Controllers;

use App\Models\Fabric;
use Illuminate\Http\Request;

class FabricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.materials.fabric');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fabric::create($request->all());
        return redirect()->route('materials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function show(Fabric $fabric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function edit(Fabric $fabric)
    {
        return view('pages.materials.fabric', compact('fabric'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fabric $fabric)
    {
        $fabric->update($request->all());
        return redirect()->route('materials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fabric  $fabric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fabric $fabric)
    {
        $fabric->delete();
        return redirect()->route('materials.index');
    }
}

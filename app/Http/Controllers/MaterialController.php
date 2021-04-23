<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Tree;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::get();
        return view('pages.materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // trees 
        $trees = Tree::get();

        // colors 
        $colors = Color::get();

        return view('pages.materials.form', compact('colors', 'trees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material = Material::create($request->all());

        // colors 
        if ($request->input('colors')) :
            $material->colors()->attach($request->input('colors'));
        endif;

        return redirect()->route('materials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        // trees 
        $trees = Tree::get();

        // colors 
        $colors = Color::get();

        return view('pages.materials.form', compact('material', 'colors', 'trees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        $material->update($request->all());

        // addresses 
        $material->colors()->detach();

        if ($request->input('colors')) :
            $material->colors()->attach($request->input('colors'));
        endif;

        $material->save();

        return redirect()->route('materials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        // colors 
        $material->colors()->detach();
        $material->delete();

        return redirect()->route('materials.index');
    }
}

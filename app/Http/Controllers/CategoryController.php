<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  // categories.index
  public function index()
  {
    // categories
    $categories = Category::get();

    return view('pages.categories.index', compact('categories'));
  }

  // categories.create
  public function create()
  {
    return view('pages.categories.form');
  }

  // categories.store
  public function store(Request $request)
  {
    Category::create($request->all());
    return redirect()->route('categories.index');
  }

  // categories.edit
  public function edit(Category $category)
  {
    return view('pages.categories.form', compact('category'));
  }

  // categories.update
  public function update(Request $request, Category $category)
  {
    $category->update($request->all());
    return redirect()->route('categories.index');
  }

  // categories.destroy
  public function destroy(Category $category)
  {
    $category->delete();
    return redirect()->route('categories.index');
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DataController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function products(Request $request)
  {
    $id = $request->input('category_id');

    if ($id) {
      $products = Product::where('category_id', $id)->get();
    }

    // else {
    //     $products = Product::get();
    // }

    // if($defects) {
    //     $option = '<option disabled selected>Выберите неисправность</option>';//Первый оптион по дефолту выбор
    // foreach ($defects as $defect) {//Перебираем все неисправности
    //     $option .= ' <option value="'.$defect->id.'" >'.$defect->desc.'</option>';//И добавляем их в переменную
    // }
    // $rez = [
    //     'rez' => 1,
    //     'option' => $option
    // ];
    //}

    return $products;
  }
}

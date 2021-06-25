<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SimpleChart;

class GraphController extends Controller
{
  // graph.index
  public function index(Request $request)
  {
    // duration  
    $from = $request->date_from;
    $to   = $request->date_to;

    // checking fields for nullable
    if (is_null($from) || is_null($to)) {
      $sales = getSales();
      $income = getIncome();
      $outcome = getOutcome();
    } else {
      $sales = getSales()->whereBetween('date_on', [$from, $to]);
      $income = getIncome()->whereBetween('date', [$from, $to]);
      $outcome = getOutcome()->whereBetween('date', [$from, $to]);
    }

    // charts 
    $chart_s = new SimpleChart; // chart of sales 
    $chart_b = new SimpleChart; // chart of budget 
    $chart_f = new SimpleChart; // chart of forecast 

    // parametrs for chart of sales  
    $products = $sales->pluck('name', 'id');
    $dates_s = $sales->pluck('', 'date_on')->keys();
    $keys_s = [];
    $temp = [];

    foreach ($dates_s as $date_s) {
      array_push($keys_s, $date_s);
    }

    foreach ($products as $id => $name) {
      $temp[$id] = array_fill_keys($keys_s, null);
    }

    foreach ($dates_s as $date_s) {
      foreach ($sales as $sale) {
        if ($temp[$sale->id] && $date_s == $sale->date_on) {
          $temp[$sale->id][$date_s] = $sale->count;
        }
      }
    }

    foreach ($temp as $id => $t) {
      $chart_s->labels($dates_s);
      $chart_s
        ->dataset($sales->where('id', $id)->first()->name, 'bar', $t)
        ->options(['backgroundColor' => getColor()]);
    }

    // parametrs for chart of budget 
    $budgets = $income->merge($outcome);
    $dates_b = $budgets->pluck('type', 'date')->keys();
    $keys_b = [];

    foreach ($dates_b as $date_b) {
      array_push($keys_b, $date_b);
    }

    $budget_p = array_fill_keys($keys_b, null);
    $budget_m = array_fill_keys($keys_b, null);

    foreach ($dates_b as $date_b) {
      foreach ($budgets as $budget) {
        // plus 
        if ($budget->type == 1 && $budget->date == $date_b) {
          $budget_p[$date_b] = $budget->total;
        }
        // minus 
        if ($budget->type == 2 && $budget->date == $date_b) {
          $budget_m[$date_b] = $budget->total;
        }
      }
    }

    $chart_b->labels($dates_b);
    $chart_b
      ->dataset('Приход', 'bar', $budget_p)
      ->options(['backgroundColor' => '#00C851']);
    $chart_b
      ->dataset('Расход', 'bar', $budget_m)
      ->options(['backgroundColor' => '#ff4444']);

    return view(
      'pages.charts.index',
      compact(
        'from',
        'to',
        'chart_s',
        'chart_b',
        'chart_f'
      )
    );
  }
}

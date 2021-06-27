<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SimpleChart;
use DateTime;

class GraphController extends Controller
{
  // graph.index
  public function index(Request $request)
  {
    // charts 
    $charts = config('constants.charts');

    // chart is active 
    $chart_id = $request->chart;

    // charts 
    $chart_f = new SimpleChart; // chart of forecast 
    $chart_s = new SimpleChart; // chart of sales 
    $chart_b = new SimpleChart; // chart of budget 

    // parametrs for chart of forecast
    $values = getInitDataOfSales();
    $forecast_from = $request->forecast_from;
    $forecast_to   = $request->forecast_to;

    $calc = [
      'n' => 0,
      'Y' => 0,
      'X' => 0,
      'YX' => 0,
      'XX' => 0,
      'a' => 0,
      'b' => 0,
    ];

    // calculation variables
    foreach ($values as $id => $value) {
      $calc['n'] += 1;
      $calc['Y'] += $value->total;
      $calc['X'] += $id + 1;
      $calc['YX'] += ($id + 1) * $value->total;
      $calc['XX'] += pow($id + 1, 2);
    }

    // calculation 'a'
    $calc['a'] = round(($calc['YX'] - $calc['X'] * $calc['Y'] / $calc['n']) / ($calc['XX'] - ($calc['X'] * $calc['X']) / $calc['n']), 2);

    // calculation 'b'
    $calc['b'] = round(($calc['Y'] / $calc['n']) - ($calc['a'] * $calc['X'] / $calc['n']), 2);

    if (is_null($forecast_from) || is_null($forecast_to)) {

      $forecast = getInitDataOfSales();

      $chart_f->labels($forecast->pluck('total', 'date')->keys());
      $chart_f
        ->dataset('Прогноз', 'bar', $forecast->pluck('total', 'date')->values())
        ->options(['backgroundColor' => '#00C851']);
    } else {

      $forecast = [];
      $forecast_i = []; // initial data 
      $forecast_p = []; // prediction data 
      $init_dates = getInitDataOfSales()->pluck('', 'date')->keys();
      $pred_dates = getMonths($forecast_from, $forecast_to);
      $dates_f = $init_dates->merge($pred_dates);

      foreach ($dates_f as $id => $date_f) {
        $forecast[$id]['date'] = $date_f;
        $forecast[$id]['total'] = round($calc['a'] * ($id + 1) + $calc['b']);
        $forecast[$id]['type'] = 2;

        foreach ($values as $value) {
          if ($date_f == $value->date) {
            $forecast[$id]['total'] = $value->total;
            $forecast[$id]['type'] = 1;
          }
        }
      }

      foreach ($forecast as $id => $fore) {
        $forecast_i[$fore['date']] = null;
        $forecast_p[$fore['date']] = null;

        if ($fore['type'] == 1) {
          $forecast_i[$fore['date']] = $fore['total'];
        }

        if ($fore['type'] == 2) {
          $forecast_p[$fore['date']] = $fore['total'];
        }
      }

      $chart_f->labels($dates_f);
      $chart_f
        ->dataset('Исходные данные', 'bar', array_values($forecast_i))
        ->options(['backgroundColor' => '#00C851']);
      $chart_f
        ->dataset('Прогноз', 'bar', array_values($forecast_p))
        ->options(['backgroundColor' => '#ffbb33']);
    }

    // ================================================================

    // parametrs for chart of sales  
    $sales_from = $request->sales_from;
    $sales_to   = $request->sales_to;

    if (is_null($sales_from) || is_null($sales_to)) {
      $sales = getSales();
    } else {
      $sales = getSales()->whereBetween('date_on', [$sales_from, $sales_to]);
    }

    // if (count($sales) == 0) {
    //   $sales = getSales();
    //   session()->flash('warning', 'В БД отсутствуют записи за выбранный период');
    // } else {
    //   session()->flash('success', 'Запрос успешно выполнен');
    // }

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

    // ================================================================

    // parametrs for chart of budget 
    $budget_from = $request->budget_from;
    $budget_to   = $request->budget_to;

    if (is_null($budget_from) || is_null($budget_to)) {
      $budgets = getBudgets();
    } else {
      $budgets = getBudgets()->whereBetween('date', [$budget_from, $budget_to]);
    }

    // if (count($budgets) == 0) {
    //   $budgets = getBudgets();
    // }

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

    // ================================================================

    return view(
      'pages.charts.index',
      compact(
        'charts',
        'chart_id',
        'forecast_from',
        'forecast_to',
        'sales_from',
        'sales_to',
        'budget_from',
        'budget_to',
        'chart_s',
        'chart_b',
        'chart_f'
      )
    );
  }
}

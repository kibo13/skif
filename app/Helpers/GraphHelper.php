<?php

use Illuminate\Support\Facades\DB;

function getColor()
{
  return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

function getSales()
{
  return DB::table('orders')
    ->join('order_top', 'order_top.order_id', '=', 'orders.id')
    ->join('tops', 'tops.id', '=', 'order_top.top_id')
    ->join('products', 'tops.product_id', '=', 'products.id')
    ->select(
      'products.id',
      'orders.date_on',
      DB::raw('SUM(order_top.count) as count'),
      'products.name'
    )
    ->groupBy(
      'products.id',
      'orders.date_on',
      'order_top.count',
      'products.name'
    )
    ->orderBy('orders.date_on')
    ->get();
}

function getIncome()
{
  return DB::table('orders')
    ->select(
      'orders.date_on as date',
      DB::raw('"Приход" as name'),
      DB::raw('1 as type'),
      DB::raw('SUM(orders.total) as total')
    )
    ->groupBy('orders.date_on', 'name', 'type')
    ->get();
}

function getOutcome()
{
  return DB::table('purchases')
    ->select(
      'purchases.date_off as date',
      DB::raw('"Расход" as name'),
      DB::raw('2 as type'),
      DB::raw('SUM(purchases.total) as total')
    )
    ->where('purchases.date_off', '!=', null)
    ->groupBy('purchases.date_off', 'name', 'type')
    ->get();
}

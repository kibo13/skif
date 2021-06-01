<?php

use Illuminate\Support\Facades\DB;

function lightRest($in, $out)
{
  // outcome is null 
  if (is_null($out)) {
    $rest = 100;
  }
  // outcome isn't null 
  else {
    $rest = 100 - round($out * 100 / $in);
  }

  return $rest;
}

function rests()
{
  $rests = DB::table('moms')
    ->join(
      'movements',
      'moms.movement_id',
      '=',
      'movements.id'
    )
    ->join(
      'materials',
      'materials.id',
      '=',
      'moms.material_id'
    )
    ->leftJoin(
      'colors',
      'colors.id',
      '=',
      'moms.color_id'
    )
    ->select(
      'materials.id as material_id',
      'materials.name AS material',
      'materials.measure',
      'colors.id as color_id',
      'colors.name AS color',
      'materials.L',
      'materials.B',
      'materials.H',
      'colors.image',
      DB::raw('SUM(case when movements.tot = 1 then moms.count end) as income'),
      DB::raw('SUM(case when movements.tot = 2 then moms.count end) as outcome'),
      DB::raw('SUM(case when movements.tot = 1 then moms.count end) - SUM(case when movements.tot = 2 then moms.count end) as rest')
    )
    ->groupBy('moms.material_id', 'moms.color_id')
    ->get();

  return $rests;
}

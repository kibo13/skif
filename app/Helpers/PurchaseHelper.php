<?php

use Illuminate\Support\Facades\DB;

function getAllMaterials()
{
  $materials = DB::table('materials')
    ->leftJoin(
      'color_material',
      'color_material.material_id',
      '=',
      'materials.id'
    )
    ->leftJoin(
      'colors',
      'color_material.color_id',
      '=',
      'colors.id'
    )
    ->select(
      'materials.id as material_id',
      'materials.name AS material',
      'colors.id as color_id',
      'colors.name AS color',
      'materials.measure',
      'materials.L',
      'materials.B',
      'materials.H',
      'colors.image'
    )
    ->get();

  return $materials;
}

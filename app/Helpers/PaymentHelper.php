<?php

function calcDepo($value)
{
  // converted number
  $convert = ceil($value / 2);

  // result
  $result = number_format($convert) . ' ₽';

  return $result;
}

function calcDebt($value)
{
  // converted number
  $convert = floor($value / 2);

  // result
  $result = number_format($convert) . ' ₽';

  return $result;
}

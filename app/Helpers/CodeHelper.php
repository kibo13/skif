<?php

use Carbon\Carbon;

function getCode()
{
  // current date 
  $current = Carbon::now()->addHour(5);
  
  // code
  $code = preg_replace('/[- :]/', '', $current);

  return substr($code, 2);
}

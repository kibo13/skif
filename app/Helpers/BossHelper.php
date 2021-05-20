<?php

use App\Models\User;

function getBoss()
{
  // search user
  $user = User::where('role_id', '=', 2)->first();

  // director
  $director = $user->worker->fio;

  return $director;
}

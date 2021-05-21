<?php

use App\Models\User;

function getShortBoss()
{
  // search user
  $user = User::where('role_id', '=', 2)->first();

  // director
  $short_name = $user->worker->fio;

  return $short_name;
}

function getFullBoss()
{
  // search user
  $user = User::where('role_id', '=', 2)->first();

  $lastname = $user->worker->lastname;
  $firstname = $user->worker->firstname;
  $surname = $user->worker->surname;

  // director
  $full_name = $lastname . ' ' . $firstname . ' ' . $surname;

  return $full_name;
}

function getFIO($lastname, $firstname, $surname)
{
  $F = $lastname;
  $I = substr($firstname, 0, 2);
  $O = substr($surname, 0, 2);

  return ucfirst($F) . ' ' . ucfirst($I) . '.' . ucfirst($O) . '.';
}

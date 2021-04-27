<?php

function getFIO($lastname, $firstname, $surname)
{
  $F = $lastname;
  $I = substr($firstname, 0, 2);
  $O = substr($surname, 0, 2);

  return ucfirst($F) . ' ' . ucfirst($I) . '.' . ucfirst($O) . '.';
}



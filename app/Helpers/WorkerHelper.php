<?php

function getFIO($lastname, $firstname, $surname)
{

  $F = $lastname;
  $I = substr($firstname, 0, 1);
  $O = substr($surname, 0, 1);

  return ucfirst($F) . ' ' . ucfirst($I) . '.' . ucfirst($O) . '.';

}



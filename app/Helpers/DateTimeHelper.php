<?php

function getDMY($date)
{
  return date('d.m.Y', strtotime($date));
}

function getHI($time)
{
  return date('H:i', strtotime($time));
}


<?php
  $timestamp = time() + (60 * 60 * 24) * 7;
  $next_week = date('Y년m월d일 H시i분s초',$timestamp);
  print $next_week;
?>

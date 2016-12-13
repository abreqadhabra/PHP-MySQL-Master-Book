<?php



$timestamp = time() + ( 60 * 60 * 24 ) * 7;
$next_week = date('Y年m月d日 H時i分s秒', $timestamp );
print $next_week;



?>

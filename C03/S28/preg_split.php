<?php
  $string = "abcedfg";
  $array = preg_split('//',$string,- 1,PREG_SPLIT_NO_EMPTY);
  print_r($array);
?>

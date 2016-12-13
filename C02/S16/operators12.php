<?php
  $data1 = array("name" => "○철수","age" => 20);
  $data2 = array("name" => "○영희","tall" => 180,"age" => 30);
  $data = $data1 + $data2;
  print "<PRE>";
  var_dump($data);
  print "</PRE>";
?>
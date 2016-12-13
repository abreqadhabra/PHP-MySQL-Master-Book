<?php
  $data = array("TV1" => "500","TV2" => "1000","RADIO1" => "800");
  $add_data = array("TV1" => "2000","RADIO2" => "600");
  $result = array_merge($data,$add_data);
  print "<PRE>";
  print_r($result);
  print "</PRE>";
?>

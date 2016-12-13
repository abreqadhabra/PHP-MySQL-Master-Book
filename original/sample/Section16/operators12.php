<?php
$data1 = array("name" => "○田○夫", "age"  => 20);
$data2 = array("name" => "○木○郎", "tall" => 180, "age" => 30);

$data = $data1 + $data2;

print "<PRE>";
var_dump($data);
print "</PRE>";
?>
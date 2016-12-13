<?php



$data   = array("A", "B", "C", "D", "E");
print implode(',', $data) . '<BR>';
$result = array_slice($data,  0,  4);// A,B,C,Dを取り出します。
print implode(',', $result) . '<BR>';
$result = array_slice($data, -3,  1);// Cを取り出します。
print implode(',', $result) . '<BR>';
$result = array_slice($data,  3, -1);// Dを取り出します。
print implode(',', $result) . '<BR>';
$result = array_slice($data,  2);    // C,D,Eを取り出します。
print implode(',', $result) . '<BR>';



?>

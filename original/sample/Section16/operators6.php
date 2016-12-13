<?php
$age         = 19;// 年齢
$adult_age   = 20;// 比較のための年齢
$adult_check = ($adult_age <= $age) ? "大人" : "子供" ;

print $adult_check . "です。";

?>
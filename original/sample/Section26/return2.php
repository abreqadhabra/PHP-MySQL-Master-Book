<?php

list($year, $month, $day) = get_today();
print $year . '年' . $month . '月' . $day . '日';

function get_today()
{
	$year  = date('Y');
	$month = date('m');
	$day   = date('d');
	return array($year, $month, $day);
}
?>
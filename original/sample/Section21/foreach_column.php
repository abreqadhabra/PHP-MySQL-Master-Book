<?php
$week = array( "月", "火", "水", "木", "金", "土", "日");
reset($week);
while( list( , $value) = each($week) )
{
	print $value;
	print "<BR>";
}
?>
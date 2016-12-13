<?php



$number = "123456";
if(preg_match("/([0-9][0-9])([0-9]+)/", $number, $matches))
{
	print $matches[0]; // 123456が格納される
	print "<BR>";
	print $matches[1]; // 12が格納される
	print "<BR>";
	print $matches[2]; // 3456が格納される
}


?>

<?php



$number = "123456";

if(preg_match("/[0-9]+/", $number))
{
	print "数字です！";
}else{
	print "数字以外の文字です。";
}



?>

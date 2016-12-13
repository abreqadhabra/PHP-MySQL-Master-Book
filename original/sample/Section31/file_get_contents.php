<?php



$filename = "test.txt";
if(is_readable($filename))
{
	$contents = file_get_contents($filename);
	print $contents;

}else{
	print $filename . "は読み込めません。";
}



?>

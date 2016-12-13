<?php

$filename = "test.txt";
if(is_file($filename) && unlink($filename))
{
	print $filename . "を削除しました。";
}else{
	print $filename . "は削除できません。";
}

?>

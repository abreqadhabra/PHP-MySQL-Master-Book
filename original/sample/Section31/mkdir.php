<?php

$dirname = "temp";
if(!is_dir($dirname) && mkdir($dirname))
{
	print $dirname . "を作成しました。";
}else{
	print $dirname . "は作成できません。";
}

?>

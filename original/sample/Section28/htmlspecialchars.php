<?php


$string = '<A href="http://book.mycom.co.jp/">マイナビブックス</A>';
$result = htmlspecialchars($string, ENT_QUOTES);
print $result;


?>
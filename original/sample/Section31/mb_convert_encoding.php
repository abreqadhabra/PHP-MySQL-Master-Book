<?php



$filename = "test.txt";
$contents = "あいうえおかきくけこ";
$contents = mb_convert_encoding($contents, "SJIS", "UTF-8");
file_put_contents($filename, $contents);
print "書き込みました。";



?>

<?php


// このコードを動作させるにはtest.dataが必要です。 
$downloadfile = "data.csv";
header("Content-Disposition: attachment; filename=$downloadfile");
header("Content-type: application/octet-stream; name=$downloadfile");
$result = file_get_contents("test.data");
print $result;



?>

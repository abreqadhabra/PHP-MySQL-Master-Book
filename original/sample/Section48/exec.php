<?php
// Windows
$result = exec("dir");
print mb_convert_encoding($result, "UTF-8", "SJIS");

// Mac、Linux
//$result = exec("ls");
//print $result;
?>

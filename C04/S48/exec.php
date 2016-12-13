<?php
  // Windows
  $result = exec("dir");
  print mb_convert_encoding($result,"UTF-8","EUC-KR");
  // Mac, Linux
  //$result = exec("ls");
  //print $result;
?>
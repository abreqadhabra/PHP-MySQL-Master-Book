<?php
  $filename = "test.txt";
  if(is_readable($filename)){
    $contents = file_get_contents($filename);
    print $contents;
  }else{
    print $filename."는 읽어 들일 수 없습니다.";
  }
?>

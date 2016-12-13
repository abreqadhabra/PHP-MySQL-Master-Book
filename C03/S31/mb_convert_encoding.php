<?php
  $filename = "test.txt";
  $contents = "가나다라마바사아자차";
  $contents = mb_convert_encoding($contents,"EUC-KR","UTF-8");
  file_put_contents($filename,$contents);
  print "기록하였습니다.";
?>

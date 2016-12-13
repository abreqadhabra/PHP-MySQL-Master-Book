<?php
  // 이 코드를 동작시키기 위해서는 test.data가 필요합니다.
  $downloadfile = "data.csv";
  header("Content-Disposition: attachment; filename=$downloadfile");
  header("Content-type: application/octet-stream; name=$downloadfile");
  $result = file_get_contents("test.data");
  print $result;
?>

<?php
  $str = "안녕하세요.";
  $length = strlen($str);
  $mb_length = mb_strlen($str);
  //결과 확인
  print $length;
  print $mb_length;
?>
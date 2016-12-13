<?php
  $number = "123456";
  if(preg_match("/([0-9][0-9])([0-9]+)/",$number,$matches)){
    print $matches[0]; // 123456 일치합니다.
    print "<BR>";
    print $matches[1]; // 12 일치합니다.
    print "<BR>";
    print $matches[2]; // 3456 일치합니다.
  }
?>

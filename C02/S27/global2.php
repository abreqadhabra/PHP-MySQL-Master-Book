<?php
  //전역 변수
  $data = 5;
  function scope_test(){
    global $data;
    //전역 변수를 참조
    $data += 1;
    print $data;
    print "<BR>";
  }
  print $data;
  print "<BR>";
  scope_test();
  print $data;
  print "<BR>";
?>
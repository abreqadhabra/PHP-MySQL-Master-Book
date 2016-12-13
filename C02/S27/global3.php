<?php
  //전역 변수
  $data = 5;
  function scope_test(){
    //전역 변수를 참조
    $GLOBALS['data'] += 1;
    print $GLOBALS['data'];
    print "<BR>";
  }
  print $data;
  print "<BR>";
  scope_test();
  print $data;
  print "<BR>";
?>

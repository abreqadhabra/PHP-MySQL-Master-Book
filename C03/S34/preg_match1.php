<?php
  $number = "123456";
  if(preg_match("/[0-9]+/",$number)){
    print "숫자입니다!";
  }else{
    print "숫자 이외의 문자입니다.";
  }
?>

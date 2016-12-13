<?php
  $str = "abcdefghijklemnop";
  $byte = 16;
  $flag = checkByte($str,$byte);
  if($flag){
    print "OK입니다.";
  }else{
    print "오류입니다.";
    print $byte;
    print "Byte를 초과하였습니다.";
  }
  function checkByte($str,$byte){
    $strlen = strlen($str);
    if($strlen <= $byte){
      return true;
    }
    return false;
  }
?>
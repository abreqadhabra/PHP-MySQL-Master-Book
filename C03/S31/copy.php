<?php
  if(copy("test.txt","test.bak")){
    print "복사에 성공하였습니다.";
  }else{
    print "복사 할 수 없습니다.";
  }
?>

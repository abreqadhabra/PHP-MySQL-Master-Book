<?php
  $filename = "test.txt";
  if(is_file($filename) && unlink($filename)){
    print $filename."를 삭제하였습니다.";
  }else{
    print $filename."는 삭제할 수 없습니다.";
  }
?>

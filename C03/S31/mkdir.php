<?php
  $dirname = "temp";
  if(!is_dir($dirname) && mkdir($dirname)){
    print $dirname."를 만들었습니다.";
  }else{
    print $dirname."는 만들 수 없습니다.";
  }
?>

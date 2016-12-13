<?php
  $type = "form";
  if($type == "form"){
    print "등록 폼입니다.";// 등록 폼을 표시
  }else if($type == "exec"){
    print "등록 처리를 실행중";  // 등록 처리를 실행
  }else{
    print "화면이 없습니다."; //오류 처리
  }
?>
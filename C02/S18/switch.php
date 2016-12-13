<?php
  $type = "form";
  switch($type){
    // 등록 폼을 표시
    case "form":
      print "등록 폼입니다.";
      break;
    // 확인 화면을 표시
    case "confirm":
      print "확인 화면입니다.";
      break;
    // 등록처리를 실행
    case "exec":
      print "등록처리를 실행중";
      break;
    //오류 처리
    default:
      print "화면이 없습니다.";
  }
?>
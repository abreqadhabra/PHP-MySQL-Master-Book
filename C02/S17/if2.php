<?php
  $username = "user";
  $password = "pass";
  $db_data["username"] = "user";
  $db_data["password"] = "pass";
  if($db_data["username"] == $username && $db_data["password"] == $password){
    // 회원 페이지 표시
    print "회원 페이지입니다.";
  }else{
    // 로그인실패 처리
    print "로그인에 실패하였습니다.";
  }
?>
<?php
  check_member();
  function check_member($username = "guest",$password = "guest"){
    if($username == "guest" && $password == "guest"){
      print "게스트님 환영합니다!";
    }else{
      print "회원님 환영합니다!";
    }
  }
?>
<?php
  $to = "xxxx@xxxxxxx";
  $subject = "발송 테스트";
  $message = "현재 메일 테스트 중입니다.";
  $add_header = "From: xxxx@xxxxxxx\r\nCc: xxxx@xxxxxxx";
  if(mb_send_mail($to,$subject,$message,$add_header)){
    print "메일을 발송하였습니다.";
  }else{
    print "메일 발송을 실패하였습니다.";
  }
?>

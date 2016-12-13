<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  $mysqli = new mysqli('localhost','sample','password','sampledb');
  if($mysqli->connect_error){
    die('Connect Error:('.$mysqli->connect_errno.') '.$mysqli->connect_error);
  }
  print 'mysqli 클래스를 통해 접속이 성공하였습니다.';
  // 여기에서 데이터베이스 관련 처리를 합니다.
  $mysqli->close();
?>
</BODY>
</HTML>

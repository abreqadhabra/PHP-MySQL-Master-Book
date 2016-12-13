<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  $con = mysql_connect('localhost','sample','password') or die('접속할 수 없습니다.');
  print 'mysql 함수로 접속이 성공하였습니다.';
  mysql_select_db('sampledb');
  // 여기에서 데이터베이스 관련 처리를 합니다.
  mysql_close($con);
?>
</BODY>
</HTML>

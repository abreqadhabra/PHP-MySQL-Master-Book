<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  $pdo  = new PDO('mysql:host=localhost;dbname=sampledb;charset=utf8','sample','password');
  print 'PDO 클래스를 통해 접속이 성공하였습니다.';
  // 여기에서 데이터베이스 관련 처리를 합니다.
  $pdo = null;
?>
</BODY>
</HTML>
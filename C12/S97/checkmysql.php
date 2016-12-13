<?php
  $db_user = "sample";    // 사용자명
  $db_pass = "password";    // 패스워드
  $db_host = "localhost";    // 호스트명
  $db_name = "sampledb";    // 데이터베이스명
  $db_type = "mysql";         // 데이터베이스 종류
  $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
  $pdo = new PDO($dsn,$db_user,$db_pass);
  print $pdo->getAttribute(PDO::ATTR_SERVER_VERSION);
?>
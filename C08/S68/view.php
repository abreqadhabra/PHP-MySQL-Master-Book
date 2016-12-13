<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  $db_user = "sample";    // 사용자명
  $db_pass = "password";    // 패스워드
  $db_host = "localhost";    // 호스트명
  $db_name = "sampledb";    // 데이터베이스명
  $db_type = "mysql";    // 데이터베이스 종류
  $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
  try{
    $pdo = new PDO($dsn,$db_user,$db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    print "접속하였습니다.<br>";
  }catch(PDOException $Exception){
    die('오류:'.$Exception->getMessage());
  }
  try{
    $pdo->beginTransaction();
    $sql = "INSERT  INTO member (last_name, first_name, age) VALUES ( :last_name, :first_name, :age )";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':last_name',$_POST['last_name'],PDO::PARAM_STR);
    $stmh->bindValue(':first_name',$_POST['first_name'],PDO::PARAM_STR);
    $stmh->bindValue(':age',$_POST['age'],PDO::PARAM_INT);
    $stmh->execute();
    $pdo->commit();
    print "데이터를 ".$stmh->rowCount()."건 입력하였습니다.<br>";
  }catch(PDOException $Exception){
    $pdo->rollBack();
    print "오류:".$Exception->getMessage();
  }
?>
</BODY>
</HTML>
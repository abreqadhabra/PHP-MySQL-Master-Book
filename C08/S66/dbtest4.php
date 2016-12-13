<html>
<head><title>PHP TEST</title></head>
<body>
<?php
  // 사용자명 sample을 samplee로 입력하여 접속 오류가 발생합니다.
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=sampledb;charset=utf8','samplee','password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    print "접속하였습니다.";
  }catch(PDOException $Exception){
    die('접속 오류:'.$Exception->getMessage());
  }
?>
</body>
</html>
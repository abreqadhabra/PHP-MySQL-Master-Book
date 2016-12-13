<?php
  session_start();
?>
<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  require_once("MYDB.php");
  $pdo = db_connect();
  // 세션 변수를 받습니다.
  $id = $_SESSION['id'];
  try{
    $pdo->beginTransaction();
    $sql = "UPDATE  member
            SET
              last_name  = :last_name,
              first_name = :first_name,
              age        = :age
            WHERE id = :id";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':last_name',$_POST['last_name'],PDO::PARAM_STR);
    $stmh->bindValue(':first_name',$_POST['first_name'],PDO::PARAM_STR);
    $stmh->bindValue(':age',$_POST['age'],PDO::PARAM_INT);
    $stmh->bindValue(':id',$id,PDO::PARAM_INT);
    $stmh->execute();
    $pdo->commit();
    print "데이터를 ".$stmh->rowCount()."건 수정하였습니다.<br>";
  }catch(PDOException $Exception){
    $pdo->rollBack();
    print "오류:".$Exception->getMessage();
  }
  // 세션 변수를 전부 삭제합니다.
  $_SESSION = array();
  // 마지막으로 세션을 파기합니다.
  session_destroy();
?>
</BODY>
</HTML>
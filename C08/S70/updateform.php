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
  // 여기를 변경하면 수정대상이 바뀝니다.
  $id = 1;
  $_SESSION['id'] = $id;
  try{
    $sql = "SELECT * FROM member WHERE id = :id ";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':id',$id,PDO::PARAM_INT);
    $stmh->execute();
    $count = $stmh->rowCount();
  }catch(PDOException $Exception){
    print "오류:".$Exception->getMessage();
  }
  if($count < 1){
    print "수정 데이터가 없습니다.<BR>";
  }else{
    $row = $stmh->fetch(PDO::FETCH_ASSOC);
    ?>
    <FORM name="form1" method="post" action="update.php">
      번호：<?=htmlspecialchars($row['id'])?><BR>
      성：<INPUT type="text" name="last_name"
               value="<?=htmlspecialchars($row['last_name'])?>"><BR>
      이름：<INPUT type="text" name="first_name"
                value="<?=htmlspecialchars($row['first_name'])?>"><BR>
      연령：<INPUT type="text" name="age"
                value="<?=htmlspecialchars($row['age'])?>"><BR>
      <INPUT type="submit" value="수정">
    </FORM>
    <?php
  }
?>
</BODY>
</HTML>
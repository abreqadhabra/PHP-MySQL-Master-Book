<?php
  session_start();
?>
<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<HR size="1" noshade>
수정화면
<HR size="1" noshade>
[ <a href="list.php">되돌아가기</a>]
<BR>
<?php
  require_once("MYDB.php");
  $pdo = db_connect();
  if(isset($_GET['id']) && $_GET['id'] > 0){
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
  }else{
    exit('잘못된 파라미터입니다.');
  }
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
    <FORM name="form1" method="post" action="list.php">
      번호：<?=htmlspecialchars($row['id'])?><BR>
      성：<INPUT type="text" name="last_name"
               value="<?=htmlspecialchars($row['last_name'])?>"><BR>
      이름：<INPUT type="text" name="first_name"
                value="<?=htmlspecialchars($row['first_name'])?>"><BR>
      연령：<INPUT type="text" name="age"
                value="<?=htmlspecialchars($row['age'])?>"><BR>
      <INPUT type="hidden" name="action" value="update">
      <INPUT type="submit" value="수정">
    </FORM>
    <?php
  }
?>
</BODY>
</HTML>
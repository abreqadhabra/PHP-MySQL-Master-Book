<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  require_once("MYDB.php");
  $pdo = db_connect();
  if(isset($_GET['action']) && $_GET['action'] == 'delete' && $_GET['id'] > 0){
    try{
      $pdo->beginTransaction();
      $id = $_GET['id'];
      $sql = "DELETE FROM member WHERE id = :id";
      $stmh = $pdo->prepare($sql);
      $stmh->bindValue(':id',$id,PDO::PARAM_INT);
      $stmh->execute();
      $pdo->commit();
      print "데이터를".$stmh->rowCount()."건 삭제하였습니다.<br>";
    }catch(PDOException $Exception){
      $pdo->rollBack();
      print "오류:".$Exception->getMessage();
    }
  }
  try{
    $sql = "SELECT * FROM member ";
    $stmh = $pdo->query($sql);
    $count = $stmh->rowCount();
    print "검색결과는".$count."건입니다.<BR>";
  }catch(PDOException $Exception){
    print "오류:".$Exception->getMessage();
  }
  if($count < 1){
    print "검색결과가 없습니다.<BR>";
  }else{
    ?>
    <TABLE width="450" border="1" cellspacing="0" cellpadding="8">
      <TBODY>
      <TR>
        <TH>번호</TH>
        <TH>성</TH>
        <TH>이름</TH>
        <TH>연령</TH>
      </TR>
      <?php
        while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
          ?>
          <TR>
            <TD align="center"><?=htmlspecialchars($row['id'])?></TD>
            <TD><?=htmlspecialchars($row['last_name'])?></TD>
            <TD><?=htmlspecialchars($row['first_name'])?></TD>
            <TD align="center"><?=htmlspecialchars($row['age'])?></TD>
          </TR>
          <?php
        }
      ?>
      </TBODY>
    </TABLE>
    <?php
  }
?>
</BODY>
</HTML>
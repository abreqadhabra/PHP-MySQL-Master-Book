<?php
  session_start();
?>
<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<HR size="1" noshade>
회원목록
<HR size="1" noshade>
[ <a href="form.html">신규입력</a>]
<BR>
<FORM name="form1" method="post" action="list.php">
  이름:<INPUT type="text" name="search_key"><INPUT type="submit" value="검색">
</FORM>
<?php
  require_once("MYDB.php");
  $pdo = db_connect();
  // 삭제처리
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
  // 입력처리
  if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    try{
      $pdo->beginTransaction();
      $sql = "INSERT  INTO member (last_name, first_name, age) VALUES ( :last_name, :first_name, :age )";
      $stmh = $pdo->prepare($sql);
      $stmh->bindValue(':last_name',$_POST['last_name'],PDO::PARAM_STR);
      $stmh->bindValue(':first_name',$_POST['first_name'],PDO::PARAM_STR);
      $stmh->bindValue(':age',$_POST['age'],PDO::PARAM_INT);
      $stmh->execute();
      $pdo->commit();
      print "데이터를".$stmh->rowCount()."건 입력하였습니다.<br>";
    }catch(PDOException $Exception){
      $pdo->rollBack();
      print "오류:".$Exception->getMessage();
    }
  }
  // 수정처리
  if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // 세션 변수에 따라 id를 받습니다.
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
      print "데이터를".$stmh->rowCount()."건 수정하였습니다.<br>";
    }catch(PDOException $Exception){
      $pdo->rollBack();
      print "오류:".$Exception->getMessage();
    }
    // 사용한 세션 변수를 삭제합니다.
    unset($_SESSION['id']);
  }
  // 검색 및 현재의 모든 데이터를 표시합니다.
  try{
    if(isset($_POST['search_key']) && $_POST['search_key'] != ""){
      $search_key = '%'.$_POST['search_key'].'%';
      $sql = "SELECT * FROM member WHERE last_name  like :last_name OR first_name  like :first_name ";
      $stmh = $pdo->prepare($sql);
      $stmh->bindValue(':last_name',$search_key,PDO::PARAM_STR);
      $stmh->bindValue(':first_name',$search_key,PDO::PARAM_STR);
      $stmh->execute();
    }else{
      $sql = "SELECT * FROM member ";
      $stmh = $pdo->query($sql);
    }
    $count = $stmh->rowCount();
    print "검색 결과는".$count."건입니다.<BR>";
  }catch(PDOException $Exception){
    print "오류:".$Exception->getMessage();
  }
  if($count < 1){
    print "검색 결과가 없습니다.<BR>";
  }else{
    ?>
    <TABLE width="450" border="1" cellspacing="0" cellpadding="8">
      <TBODY>
      <TR>
        <TH>번호</TH>
        <TH>성</TH>
        <TH>이름</TH>
        <TH>연령</TH>
        <TH>&nbsp;</TH>
        <TH>&nbsp;</TH>
      </TR>
      <?php
        while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
          ?>
          <TR>
            <TD align="center"><?=htmlspecialchars($row['id'])?></TD>
            <TD><?=htmlspecialchars($row['last_name'])?></TD>
            <TD><?=htmlspecialchars($row['first_name'])?></TD>
            <TD align="center"><?=htmlspecialchars($row['age'])?></TD>
            <TD align="center"><a href=updateform.php?id=<?=htmlspecialchars($row['id'])?>>수정</a></TD>
            <TD align="center"><a href=list.php?action=delete&id=<?=htmlspecialchars($row['id'])?>>삭제</a></TD>
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
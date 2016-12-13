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
  // POST 데이터를 받습니다.
  $search_key = '%'.$_POST['search_key'].'%';
  try{
    $sql = "SELECT * FROM member WHERE last_name  like :last_name OR first_name  LIKE :first_name ";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':last_name',$search_key,PDO::PARAM_STR);
    $stmh->bindValue(':first_name',$search_key,PDO::PARAM_STR);
    $stmh->execute();
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
<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>
<?php
require_once("MYDB.php");
$pdo = db_connect();

if(isset($_GET['action']) && $_GET['action'] == 'delete' && $_GET['id'] > 0 ){
    try {
      $pdo->beginTransaction();
      $id = $_GET['id'];
      $sql = "DELETE FROM member WHERE id = :id";
      $stmh = $pdo->prepare($sql);
      $stmh->bindValue(':id',         $id,                  PDO::PARAM_INT );
      $stmh->execute();
      $pdo->commit();
      print "データを" . $stmh->rowCount() . "件、削除しました。<br>";

    } catch (PDOException $Exception) {
      $pdo->rollBack();
      print "エラー：" . $Exception->getMessage();
    }
}


try {
  $sql= "SELECT * FROM member ";
  $stmh = $pdo->query($sql);
  $count = $stmh->rowCount();
  print "検索結果は" . $count . "件です。<BR>";
  
} catch (PDOException $Exception) {
  print "エラー：" . $Exception->getMessage();
}

if($count < 1){
	print "検索結果がありません。<BR>";
}else{
?>

<TABLE width="450" border="1"  cellspacing="0" cellpadding="8">
<TBODY>
<TR><TH>番号</TH><TH>氏</TH><TH>名</TH><TH>年齢</TH></TR>
<?php
  while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
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
</TBODY></TABLE>

<?php
}
?>

</BODY>
</HTML>

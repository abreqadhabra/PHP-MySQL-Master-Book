<?php
session_start();
?>
<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>

<?php
require_once("MYDB.php");
$pdo = db_connect();

// ここを変更すると更新対象が変わります。
$id	= 1; 
$_SESSION['id'] = $id;
try {
  $sql= "SELECT * FROM member WHERE id = :id ";
  $stmh = $pdo->prepare($sql);
  $stmh->bindValue(':id',  $id, PDO::PARAM_INT );
  $stmh->execute();
  $count = $stmh->rowCount();
  
} catch (PDOException $Exception) {
  print "エラー：" . $Exception->getMessage();
}

if($count < 1){
  print "更新データがありません。<BR>";
}else{
  $row = $stmh->fetch(PDO::FETCH_ASSOC);  
?>
<FORM name="form1" method="post" action="update.php">
番号：<?=htmlspecialchars($row['id'])?><BR>
氏：<INPUT type="text" name="last_name" value="<?=htmlspecialchars($row['last_name'])?>"><BR>
名：<INPUT type="text" name="first_name" value="<?=htmlspecialchars($row['first_name'])?>"><BR>
年齢：<INPUT type="text" name="age" value="<?=htmlspecialchars($row['age'])?>"><BR>
<INPUT type="submit" value="更　新">
</FORM>
<?php
}
?>
</BODY>
</HTML>

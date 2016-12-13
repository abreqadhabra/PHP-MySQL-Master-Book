<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>
<?php
$db_user = "sample";	// ユーザー名
$db_pass = "password";	// パスワード
$db_host = "localhost";	// ホスト名
$db_name = "sampledb";	// データベース名
$db_type = "mysql";	// データベースの種類

$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

try {
  $pdo = new PDO($dsn, $db_user,$db_pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  print "接続しました... <br>";
} catch(PDOException $Exception) {
  die('エラー :' . $Exception->getMessage());
}

// POSTされたデータを受け取ります。
$search_key = '%' . $_POST['search_key'] . '%'; 

try {
  $sql= "SELECT * FROM member WHERE last_name  like :last_name OR first_name  like :first_name ";
  $stmh = $pdo->prepare($sql);
  $stmh->bindValue(':last_name',  $search_key, PDO::PARAM_STR );
  $stmh->bindValue(':first_name', $search_key, PDO::PARAM_STR );
  $stmh->execute();
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

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


try {
  $pdo->beginTransaction();
  $sql = "INSERT  INTO member (last_name, first_name, age) VALUES ( :last_name, :first_name, :age )";
  $stmh = $pdo->prepare($sql);
  $stmh->bindValue(':last_name',  $_POST['last_name'],  PDO::PARAM_STR );
  $stmh->bindValue(':first_name', $_POST['first_name'], PDO::PARAM_STR );
  $stmh->bindValue(':age',        $_POST['age'],        PDO::PARAM_INT );
  $stmh->execute();
  $pdo->commit();
  print "データを" . $stmh->rowCount() . "件、挿入しました。<br>";
  
} catch (PDOException $Exception) {
  $pdo->rollBack();
  print "エラー：" . $Exception->getMessage();
}


?>
</BODY>
</HTML>

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

// セッション変数から受け取ります。
$id  = $_SESSION['id'];

try {
  $pdo->beginTransaction();
  $sql = "UPDATE  member
            SET 
              last_name  = :last_name,
              first_name = :first_name,
              age        = :age
            WHERE id = :id";
  $stmh = $pdo->prepare($sql);
  $stmh->bindValue(':last_name',  $_POST['last_name'],  PDO::PARAM_STR );
  $stmh->bindValue(':first_name', $_POST['first_name'], PDO::PARAM_STR );
  $stmh->bindValue(':age',        $_POST['age'],        PDO::PARAM_INT );
  $stmh->bindValue(':id',         $id,                  PDO::PARAM_INT );
  $stmh->execute();
  $pdo->commit();
  print "データを" . $stmh->rowCount() . "件、更新しました。<br>";
  
} catch (PDOException $Exception) {
  $pdo->rollBack();
  print "エラー：" . $Exception->getMessage();
}

// セッション変数を全て解除する
$_SESSION = array();

// 最終的に、セッションを破壊する
session_destroy();


?>
</BODY>
</HTML>

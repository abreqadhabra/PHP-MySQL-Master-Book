<?php
session_start();
?>
<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>
<HR size="1" noshade>
会員名簿一覧
<HR size="1" noshade>
[ <a href="form.html">新規登録</a>]
<BR>

<FORM name="form1" method="post" action="list.php">
名前：<INPUT type="text" name="search_key"><INPUT type="submit" value="検索する">
</FORM>

<?php
require_once("MYDB.php");
$pdo = db_connect();

// 削除処理
if(isset($_GET['action']) && $_GET['action'] == 'delete' && $_GET['id'] > 0 ){
    try {
      $pdo->beginTransaction();
      $id = $_GET['id'];
      $sql = "DELETE FROM member WHERE id = :id";
      $stmh = $pdo->prepare($sql);
      $stmh->bindValue(':id', $id, PDO::PARAM_INT );
      $stmh->execute();
      $pdo->commit();
      print "データを" . $stmh->rowCount() . "件、削除しました。<br>";

    } catch (PDOException $Exception) {
      $pdo->rollBack();
      print "エラー：" . $Exception->getMessage();
    }
}

// 挿入処理
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
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
}


// 更新処理
if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // セッション変数よりidを受け取ります
    $id = $_SESSION['id'];
    
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
    // 使用したセッション変数を削除する
    unset($_SESSION['id']);
}

// 検索および現在の全データを表示します
try {
  if(isset($_POST['search_key']) && $_POST['search_key'] != ""){
    $search_key = '%' . $_POST['search_key'] . '%'; 
    $sql= "SELECT * FROM member WHERE last_name  like :last_name OR first_name  like :first_name ";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':last_name',  $search_key, PDO::PARAM_STR );
    $stmh->bindValue(':first_name', $search_key, PDO::PARAM_STR );
    $stmh->execute();
  }else{
    $sql= "SELECT * FROM member ";
    $stmh = $pdo->query($sql);
  }
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
<TR><TH>番号</TH><TH>氏</TH><TH>名</TH><TH>年齢</TH><TH>&nbsp;</TH><TH>&nbsp;</TH></TR>
<?php
  while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
?>
<TR>
<TD align="center"><?=htmlspecialchars($row['id'])?></TD>
<TD><?=htmlspecialchars($row['last_name'])?></TD>
<TD><?=htmlspecialchars($row['first_name'])?></TD>
<TD align="center"><?=htmlspecialchars($row['age'])?></TD>
<TD align="center"><a href=updateform.php?id=<?=htmlspecialchars($row['id'])?>>更新</a></TD>
<TD align="center"><a href=list.php?action=delete&id=<?=htmlspecialchars($row['id'])?>>削除</a></TD>
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
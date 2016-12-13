<?php
// 1. 名前付きプレースホルダ
$sql = "INSERT  INTO member (last_name, first_name, age) VALUES ( :last_name, :first_name, :age )";
$stmh = $pdo->prepare($sql);
$stmh->bindValue(':last_name',  $_POST['last_name']);
$stmh->bindValue(':first_name', $_POST['first_name']);
$stmh->bindValue(':age',        $_POST['age']);
$stmh->execute();


// 2. 「?」プレースホルダ
$sql = "INSERT  INTO member (last_name, first_name, age) VALUES ( ?, ?, ?)";
$stmh = $pdo->prepare($sql);
$stmh->bindValue( 1,  $_POST['last_name']);
$stmh->bindValue( 2,  $_POST['first_name']);
$stmh->bindValue( 3,  $_POST['age']);
$stmh->execute();

?>
<?php
  // 1. 이름이 붙여진 placeholder
  $sql = "INSERT  INTO member (last_name, first_name, age) VALUES ( :last_name, :first_name, :age )";
  $stmh = $pdo->prepare($sql);
  $stmh->bindValue(':last_name',$_POST['last_name']);
  $stmh->bindValue(':first_name',$_POST['first_name']);
  $stmh->bindValue(':age',$_POST['age']);
  $stmh->execute();
  // 2. 「?」placeholder
  $sql = "INSERT  INTO member (last_name, first_name, age) VALUES ( ?, ?, ?)";
  $stmh = $pdo->prepare($sql);
  $stmh->bindValue(1,$_POST['last_name']);
  $stmh->bindValue(2,$_POST['first_name']);
  $stmh->bindValue(3,$_POST['age']);
  $stmh->execute();
  // 해설을 위한 코드입니다. 동작하지 않습니다.
?>
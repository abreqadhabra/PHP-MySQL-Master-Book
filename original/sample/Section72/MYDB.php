<?php

function db_connect(){
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
    } catch(PDOException $Exception) {
      die('エラー :' . $Exception->getMessage());
    }
    return $pdo;
}

?>
<?php
    $db_user = "sample";	// ユーザー名
    $db_pass = "password";	// パスワード
    $db_host = "localhost";	// ホスト名
    $db_name = "sampledb";	// データベース名
    $db_type = "mysql";         // データベースの種類

    $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
    $pdo = new PDO($dsn, $db_user,$db_pass);
    print $pdo->getAttribute(PDO::ATTR_SERVER_VERSION);
    
?>
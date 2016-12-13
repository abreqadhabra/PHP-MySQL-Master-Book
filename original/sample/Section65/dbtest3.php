<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=sampledb;charset=utf8', 'sample','password');

print 'PDOクラスによる接続に成功しました。';

// ここでデータベース関連の処理を行います。

$pdo = null;

?>
</BODY>
</HTML>

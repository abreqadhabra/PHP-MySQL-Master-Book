<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>
<?php
$mysqli = new mysqli('localhost', 'sample', 'password', 'sampledb');

if ( $mysqli->connect_error ) {
   die('Connect Error:(' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

print 'mysqliクラスによる接続に成功しました。';

// ここでデータベース関連の処理を行います。

$mysqli->close();

?>
</BODY>
</HTML>

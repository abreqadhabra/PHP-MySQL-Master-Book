<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>
<?php
$con = mysql_connect('localhost', 'sample', 'password')
       or die('接続できません。');
print 'mysql関数で接続に成功しました。';
mysql_select_db('sampledb');

// ここでデータベース関連の処理を行います。

mysql_close($con);

?>
</BODY>
</HTML>

<?php
$count = 1;
if (isset($_COOKIE["count"])) {
	$count = $_COOKIE["count"];
	$count++;
}
setcookie("count", $count, time() + 10 );
?>
<HTML>
<HEAD>
<TITLE>クッキーのテスト</TITLE>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
クッキーのテスト<BR>
<BR>
<?php
if ($count == 1) {
?>
はじめての訪問です。<BR>
<BR>
クッキー情報はありません。<BR>
このページをリロードしてください。<BR>


<?php
} else {
?>

あなたの訪問は<?=$count?>回目です。<BR>
<BR>
10秒以内にリロードするとカウントアップします。

<?php
}
?>

</BODY>
</HTML>
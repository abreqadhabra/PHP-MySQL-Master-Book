<?php
session_start();

$count = 1;
if (isset($_SESSION["count"])) {
	$count = $_SESSION["count"];
	$count++;
}
$_SESSION["count"] = $count;

?>
<HTML>
<HEAD>
<TITLE>セッション変数のテスト</TITLE>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
セッション変数のテスト<BR>
<BR>
<?php
if ($count == 1) {
?>
はじめての訪問です。<BR>
<BR>
セッション変数にデータがありません。<BR>
このページをリロードしてください。<BR>


<?php
} else {
?>

あなたの訪問は<?=$count?>回目です。<BR>

<?php
}
?>

</BODY>
</HTML>

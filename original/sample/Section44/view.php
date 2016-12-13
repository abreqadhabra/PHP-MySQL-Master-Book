<?php
session_start();
?>
<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>

<?php
if ( isset($_POST["confirm"]) ) {
?>

<?php
// 確認ボタンが押されたとき
print $_SESSION["onamae"] . "さんからのメッセージ";
print "<BR><BR>";
print "本文：<BR>";
print nl2br($_SESSION["honbun"]);
?>
<BR>
<BR>
<a href="form.html">もう一度試すにはここをクリック</a>

<HR>
<PRE>
<?php print_r($_SESSION); ?>
</PRE>
<HR>

<?php
} elseif ( isset($_POST["back"]) ) {
// 戻るボタンが押されたとき
?>

<FONT size="4">テキスト送信のテスト</FONT> 
<FORM name="form1" method="post" action="confirm.php">
名前：<BR>
<INPUT type="text" name="onamae" value="<?=$_SESSION["onamae"]?>">
<BR>
本文：<BR>
<TEXTAREA name="honbun" cols="30" rows="5"><?=$_SESSION["honbun"]?></TEXTAREA>
<BR>
<INPUT type="submit" value="送　信">
</FORM>

<?php
} else {
// 上記条件以外のとき
?>

エラーです。<BR>
<a href="form.html">form.html</a>からアクセスしてください。

<?php
}
?>

</BODY>
</HTML>

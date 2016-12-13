<?php
session_start();
$_SESSION["onamae"]  = $_POST["onamae"];
$_SESSION["honbun"]  = $_POST["honbun"];
if(isset($_POST["user_id"])){
    $_SESSION["user_id"] = $_POST["user_id"];
}
?>
<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>

確認画面
<FORM name="form1" method="post" action="view.php">
<?php
print "名前：";
print $_POST["onamae"];
print "<BR><BR>";
print "本文：<BR>";
print nl2br($_POST["honbun"]);
?>
<BR>
<INPUT type="submit" value="確　認" name="confirm">　
<INPUT type="submit" value="戻　る" name="back">
</FORM>

</BODY>
</HTML>

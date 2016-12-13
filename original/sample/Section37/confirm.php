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
<INPUT type="submit" value="確　認">
<INPUT type="hidden" name="onamae" value="<?=$_POST["onamae"]?>">
<INPUT type="hidden" name="honbun" value="<?=$_POST["honbun"]?>">
<INPUT type="hidden" name="user_id" value="<?=$_POST["user_id"]?>">
</FORM>

</BODY>
</HTML>


<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>

<?php
print $_POST["onamae"] . "さんからのメッセージ";
print "<BR><BR>";
print "本文：<BR>";
print nl2br($_POST["honbun"]);
?>


</BODY>
</HTML>
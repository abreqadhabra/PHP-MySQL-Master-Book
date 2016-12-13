<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  print $_POST["onamae"]." 님으로부터의 메시지";
  print "<BR><BR>";
  print "본문 :<BR>";
  print nl2br($_POST["honbun"]);
?>
</BODY>
</HTML>
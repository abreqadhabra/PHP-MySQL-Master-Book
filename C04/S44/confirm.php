<?php
  session_start();
  $_SESSION["onamae"] = $_POST["onamae"];
  $_SESSION["honbun"] = $_POST["honbun"];
  if(isset($_POST["user_id"])){
    $_SESSION["user_id"] = $_POST["user_id"];
  }
?>
<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
확인화면
<FORM name="form1" method="post" action="view.php">
  <?php
    print "이름:";
    print $_POST["onamae"];
    print "<BR><BR>";
    print "본문 :<BR>";
    print nl2br($_POST["honbun"]);
  ?>
  <BR>
  <INPUT type="submit" value="확인" name="confirm">　
  <INPUT type="submit" value="되돌아가기" name="back">
</FORM>
</BODY>
</HTML>
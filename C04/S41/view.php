<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  if($_POST["prefecture"] != ""){
    print "행정구역:<BR>";
    print $_POST["prefecture"];
  }else{
    print "행정구역을 선택하여 주세요.<BR>";
  }
?>
</BODY>
</HTML>
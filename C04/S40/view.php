<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  if(isset($_POST["gender"]) && ($_POST["gender"] == "남" || $_POST["gender"] == "여")){
    print "성별:<BR>";
    print $_POST["gender"];
  }else{
    print "성별을 선택하세요.<BR>";
  }
?>
</BODY>
</HTML>
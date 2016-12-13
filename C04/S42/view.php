<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  if(isset($_POST["hobby"])){
    print "저의 취미는 아래와 같습니다.<BR><BR>";
    foreach($_POST["hobby"] as $hobby){
      print $hobby;
      print "<BR>";
    }
  }else{
    print "취미가 없습니다.";
  }
?>
</BODY>
</HTML>
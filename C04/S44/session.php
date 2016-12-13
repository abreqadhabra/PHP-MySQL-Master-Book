<?php
  session_start();
  $count = 1;
  if(isset($_SESSION["count"])){
    $count = $_SESSION["count"];
    $count ++;
  }
  $_SESSION["count"] = $count;
?>
<HTML>
<HEAD>
  <TITLE>세션 변수 테스트</TITLE>
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
세션 변수 테스트<BR>
<BR>
<?php
  if($count == 1){
    ?>
    처음 방문입니다.<BR>
    <BR>
    세션 변수에 데이터가 없습니다.<BR>
    페이지를 새로고침 하세요.<BR>
    <?php
  }else{
    ?>
    당신의 방문은 <?=$count?>회째입니다.<BR>
    <?php
  }
?>
</BODY>
</HTML>
<?php
  session_start();
?>
<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>

<?php
  if(isset($_POST["confirm"])){
    ?>

    <?php
    // 확인 버튼을 누른 경우
    print $_SESSION["onamae"]."님으로부터의 메시지";
    print "<BR><BR>";
    print "본문 :<BR>";
    print nl2br($_SESSION["honbun"]);
    ?>
    <BR>
    <BR>
    <a href="form.html">한번 더 시험해 보려면 여기를 클릭</a>

    <HR>
    <PRE>
<?php print_r($_SESSION); ?>
</PRE>
    <HR>

    <?php
  }elseif(isset($_POST["back"])){
    // 되돌아가기 버튼을 누른 경우
    ?>

    <FONT size="4">텍스트 발송 테스트</FONT>
    <FORM name="form1" method="post" action="confirm.php">
      이름:<BR>
      <INPUT type="text" name="onamae" value="<?=$_SESSION["onamae"]?>">
      <BR>
      본문 :<BR>
        <TEXTAREA name="honbun" cols="30"
                  rows="5"><?=$_SESSION["honbun"]?></TEXTAREA>
      <BR>
      <INPUT type="submit" value="발송">
    </FORM>

    <?php
  }else{
    //상기 이외의 경우
    ?>

    오류입니다.<BR>
    <a href="form.html">form.html</a>로 돌아갑니다.

    <?php
  }
?>

</BODY>
</HTML>
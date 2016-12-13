<?php
  if(empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW'])){
    header("WWW-Authenticate: Basic realm=\"Member Only\"");
    header("HTTP/1.0 401 Unauthorized");
    ?>
    <HTML>
    <HEAD>
      <TITLE>Basic 인증 테스트</TITLE>
      <META http-equiv="Content-Type" content="text/html; charset=utf-8">
    </HEAD>
    <BODY>
    Basic 인증 테스트<BR>
    <BR>
    취소되었습니다.
    </BODY>
    </HTML>
    <?php
  }else{
    if($_SERVER['PHP_AUTH_USER'] == "sample" && $_SERVER['PHP_AUTH_PW'] == "password"){
      ?>
      <HTML>
      <HEAD>
        <TITLE>Basic 인증 테스트</TITLE>
        <META http-equiv="Content-Type" content="text/html; charset=utf-8">
      </HEAD>
      <BODY>
      Basic 인증 테스트<BR>
      <BR>
      안녕하세요. <?=$_SERVER['PHP_AUTH_USER']?>님
      </BODY>
      </HTML>
      <?php
    }else{
      ?>
      <HTML>
      <HEAD>
        <TITLE>Basic 인증 테스트</TITLE>
        <META http-equiv="Content-Type" content="text/html; charset=utf-8">
      </HEAD>
      <BODY>
      Basic 인증 테스트<BR>
      <BR>
      사용자ID 또는 패스워드가 틀렸습니다.
      </BODY>
      </HTML>
      <?php
    }
  }
?>
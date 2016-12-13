<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
메일 수신:
<?php
  $username = "username@gmail.com";
  $password = "password";
  $mailserver = "imap.gmail.com";
  // POP3 서버
  // $mailbox = @imap_open("{" . $mailserver . ":110/pop3}INBOX", $username, $password);
  // IMAP 서버
  // $mailbox = @imap_open("{" . $mailserver . ":143/imap/novalidate-cert}INBOX", $username, $password);
  // Gmail 서버
  $mailbox = imap_open("{".$mailserver.":993/imap/novalidate-cert/ssl}INBOX",$username,$password);
  if($mailbox){
    $mails = imap_check($mailbox);
    $count = $mails->Nmsgs;
    if($count >= 1){
      ?>
      메일이 <?=$count?>건 있습니다.<BR>
      <TABLE border=1>
        <TR>
          <TD>No</TD>
          <TD>제목</TD>
          <TD>날짜</TD>
          <TD>발신자</TD>
          <TD>크기</TD>
        </TR>
        <?php
          for($num = 1;$num <= $count;$num ++){
            $head = imap_header($mailbox,$num);
            $body = imap_body($mailbox,$num,FT_INTERNAL);
            ?>
            <TR>
              <TD><?=$num?></TD>
              <TD nowrap><?=htmlspecialchars(mb_decode_mimeheader($head->subject))?></TD>
              <TD nowrap><?=$head->date?></TD>
              <TD nowrap><?=htmlspecialchars(mb_decode_mimeheader($head->fromaddress))?></TD>
              <TD nowrap><?=$head->Size?></TD>
            </TR>
            <?php
          }
        ?>
      </TABLE>
      <?php
    }else{
      ?>
      새로운 메일이 없습니다.<BR>
      <?php
    }
    imap_close($mailbox);
  }else{
    ?>
    사용자명 또는 패스워드가 틀립니다.
    <?php
  }
?>
</BODY>
</HTML>
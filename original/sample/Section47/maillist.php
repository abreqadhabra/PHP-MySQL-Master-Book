<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
メール受信：
<?php
$username = "xxxxxxxx";
$password = "xxxxxxxx";
$mailserver = "xxxxxxxx";

// POP3サーバ
$mailbox = @imap_open("{" . $mailserver . ":110/pop3}INBOX", $username, $password);

// IMAPサーバ
// $mailbox = @imap_open("{" . $mailserver . ":143/imap/novalidate-cert}INBOX", $username, $password);

// Gmailサーバ
// $mailbox = imap_open("{" . $mailserver . ":993/imap/novalidate-cert/ssl}INBOX", $username, $password);


if ($mailbox) {
    $mails = imap_check($mailbox);
    $count = $mails->Nmsgs;
    if ($count >= 1){
?>
メールは<?=$count?>件あります。<BR>
<TABLE border=1>
<TR><TD>No</TD><TD>件名</TD><TD>日付</TD><TD>差出人</TD><TD>サイズ</TD></TR>
<?php
        for ($num = 1; $num <= $count; $num++){
            $head = imap_header($mailbox, $num);
            $body = imap_body($mailbox, $num, FT_INTERNAL);
?>         <TR>
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
        新着メールはありません。<BR>
<?php
    }
    imap_close($mailbox);
} else {
?>
ユーザー名またはパスワードが間違っています。
<?php
}
?>
</BODY>
</HTML>


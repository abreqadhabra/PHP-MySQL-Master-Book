<?php
if( empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW']) ){
    header("WWW-Authenticate: Basic realm=\"Member Only\"");
    header("HTTP/1.0 401 Unauthorized");
?>
<HTML>
<HEAD>
<TITLE>Basic認証のテスト</TITLE>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
Basic認証のテスト<BR>
<BR>
キャンセルされました。

</BODY>
</HTML>

<?php
} else {
    if($_SERVER['PHP_AUTH_USER'] == "sample" && $_SERVER['PHP_AUTH_PW'] == "password") {
?>
<HTML>
<HEAD>
<TITLE>Basic認証のテスト</TITLE>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
Basic認証のテスト<BR>
<BR>
こんにちは、<?=$_SERVER['PHP_AUTH_USER']?>さん。

</BODY>
</HTML>
<?php
    } else {
?>
<HTML>
<HEAD>
<TITLE>Basic認証のテスト</TITLE>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY>
Basic認証のテスト<BR>
<BR>

ユーザID、またはパスワードが違います。

</BODY>
</HTML>

<?php    
    }
}
?>

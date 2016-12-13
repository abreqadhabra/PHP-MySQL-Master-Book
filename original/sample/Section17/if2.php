<?php
$username = "user";
$password = "pass";


$db_data["username"] = "user";
$db_data["password"] = "pass";

if($db_data["username"] == $username && $db_data["password"] == $password )
{
	// 会員ページの表示
	print "会員ページです。";
}else{
	// ログイン失敗の処理
	print "ログインに失敗しました。";
}
?>
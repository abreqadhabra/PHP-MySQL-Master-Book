<?php

$type = "form";

if($type == "form")
{

	print "登録フォームです。";// 登録フォームを表示

}else if($type == "exec"){

	print "登録処理を実行中";  // 登録処理を実行 

}else{

	print "画面がありません。"; //エラー処理

}

?>
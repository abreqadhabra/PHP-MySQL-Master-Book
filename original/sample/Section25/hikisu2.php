<?php

check_member();

function check_member($username="guest",$password="guest")
{
	if($username == "guest" && $password == "guest")
	{
		print "ゲストさん、ようこそ！";
	}else{
		print "会員さん、ようこそ！";
	}
}
?>
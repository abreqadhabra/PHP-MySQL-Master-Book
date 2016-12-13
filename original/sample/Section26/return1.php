<?php
$str  = "abcdefghijklemnop";
$byte = 16;

$flag = checkByte($str, $byte);
if($flag){
	print "OKです。";
}else{
	print "エラーです。";
	print $byte;
	print "バイトを越えています。";
}

function checkByte( $str , $byte ){
	$strlen = strlen( $str );
	if( $strlen <= $byte ){
		return true;
	}
	return false;
}

?>
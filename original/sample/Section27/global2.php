<?php
//グローバルスコープの変数
$data = 5;

function scope_test() {
	global $data;
	//グローバルスコープの変数を参照 
	$data += 1;
	print $data;
	print "<BR>";
}

print $data;
print "<BR>";

scope_test();

print $data;
print "<BR>";

?>

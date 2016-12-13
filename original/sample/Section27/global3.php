<?php
//グローバルスコープの変数
$data = 5;

function scope_test() {
	//グローバルスコープの変数を参照 
	$GLOBALS['data'] += 1;
	print $GLOBALS['data'];
	print "<BR>";
}

print $data;
print "<BR>";

scope_test();

print $data;
print "<BR>";

?>

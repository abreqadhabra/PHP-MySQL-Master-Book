<?php
class Test
{
    public function TestPublic() {
	print "公開<BR>";
    }

    function TestNothing(){
    	print "宣言なし<BR>";
    }

    private   function TestPrivate() { 
  	print "秘密<BR>";
    }

}

$test = new Test();
$test->TestPublic();
$test->TestNothing();
$test->TestPrivate();// この部分だけエラーになります。

?>

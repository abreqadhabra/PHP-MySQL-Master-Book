<?php



if ( copy( "test.txt",  "test.bak" ) ) 
{
    print "コピーに成功しました。";
} else {
    print "コピーできませんでした。";
}

?>

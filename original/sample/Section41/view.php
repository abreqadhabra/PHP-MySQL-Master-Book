<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>

<?php
if( $_POST["ken"] != "" ){
    print "都道府県：<BR>";
    print $_POST["ken"];
}else{
    print "都道府県を選んでください。<BR>";
}
?>
</BODY>
</HTML>

<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>

<?php

if(isset($_POST["gender"]) && ($_POST["gender"] == "男" || $_POST["gender"] == "女") ){
    print "性別：<BR>";
    print $_POST["gender"];
}else{
    print "性別を選んでください。<BR>";
}
?>

</BODY>
</HTML>

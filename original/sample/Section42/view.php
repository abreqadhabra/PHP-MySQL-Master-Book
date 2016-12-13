<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>

<?php
if(isset($_POST["hobby"])){
    print "私の趣味は以下のとおりです。<BR><BR>";
    foreach($_POST["hobby"] as $hobby)
    {
        print $hobby;
        print "<BR>";
    }
}else{
   print "私の趣味はありません。";
}
?>

</BODY>
</HTML>

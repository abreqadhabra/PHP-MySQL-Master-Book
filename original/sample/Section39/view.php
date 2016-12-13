<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>

<?php
if(isset($_POST["hobby"])){
    $hobby  = implode('と', $_POST["hobby"]);
    print "私の趣味は";
    print $hobby;
    print "です。";
}else{
   print "私の趣味はありません。";
}
?>

</BODY>
</HTML>

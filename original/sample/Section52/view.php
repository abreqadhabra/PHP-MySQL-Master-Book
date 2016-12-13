<HTML>
<HEAD>
<TITLE>クラスのテスト </TITLE>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY bgcolor="#FFFFFF" text="#000000">
<FONT size="4">クラスのテスト</FONT> 
<BR><BR>
<?php
class User {
    private $name       = NULL;
    public function print_hello() {
        print $this->name;
        print "さん、こんにちは！<BR>";
    }
}

class Guest extends User {
    private $name       = "ゲスト";
    public function print_hello() {
        print $this->name;
        print "さん、はじめまして！<BR>";
    }
}

$newuser = new Guest();
$newuser->print_hello();
?>
</BODY>
</HTML>

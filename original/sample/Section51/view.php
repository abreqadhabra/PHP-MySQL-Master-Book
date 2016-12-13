<HTML>
<HEAD>
<TITLE>クラスのテスト </TITLE>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>

<BODY bgcolor="#FFFFFF" text="#000000">
<FONT size="4">クラスのテスト</FONT> 
<BR><BR>
<?php
$newuser = new User();
$newuser->print_hello();

class User {
    public $name       = '永田';
    public function print_hello() {
        print $this->name;
        print "さん、こんにちは！<BR>";
    }
}
?>
</BODY>
</HTML>
<HTML>
<HEAD>
<TITLE>トレイトのテスト </TITLE>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY bgcolor="#FFFFFF" text="#000000">
<FONT size="4">トレイトのテスト</FONT> 
<BR><BR>
<?php
class User {
    private $name       = NULL;
    public function print_hello() {
        print $this->name;
        print "さん、こんにちは！<BR>";
    }
}

trait SayMorning {
    public function print_morning() {
        print $this->name;
        print "さん、おはようございます！<BR>";
	} 
}

class Guset extends User {
    use SayMorning;
    private $name       = "ゲスト";
    public function print_hello() {
        print $this->name;
        print "さん、はじめまして！<BR>";
    }
}

$newuser = new Guset();
$newuser->print_hello();
$newuser->print_morning();
?>

</BODY>
</HTML>

<HTML>
<HEAD>
  <TITLE>Trait 테스트</TITLE>
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY bgcolor="#FFFFFF" text="#000000">
<FONT size="4">Trait 테스트</FONT>
<BR><BR>
<?php
  trait SayMorning{
    public function print_morning(){
      print $this->name;
      print "님, 안녕하세요!<BR>";
    }
  }
  class User{
    private $name = null;
    public function print_hello(){
      print $this->name;
      print "님, 반갑습니다!!<BR>";
    }
  }
  class Guset extends User{
    use SayMorning;
    private $name = "게스트";
    public function print_hello(){
      print $this->name;
      print "님, 처음 뵙겠습니다!<BR>";
    }
  }
  $newuser = new Guset();
  $newuser->print_hello();
  $newuser->print_morning();
?>
</BODY>
</HTML>

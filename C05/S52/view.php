<HTML>
<HEAD>
  <TITLE>클래스 테스트 </TITLE>
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY bgcolor="#FFFFFF" text="#000000">
<FONT size="4">클래스 테스트</FONT>
<BR><BR>
<?php
  class User{
    private $name = null;
    public function print_hello(){
      print $this->name;
      print " 님, 안녕하세요!<BR>";
    }
  }
  class Guest extends User{
    private $name = "게스트";
    public function print_hello(){
      print $this->name;
      print "님, 반갑습니다!<BR>";
    }
  }
  $newuser = new Guest();
  $newuser->print_hello();
?>
</BODY>
</HTML>
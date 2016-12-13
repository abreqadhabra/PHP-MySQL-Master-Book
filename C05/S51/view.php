<HTML>
<HEAD>
  <TITLE>클래스 테스트 </TITLE>
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<BODY bgcolor="#FFFFFF" text="#000000">
<FONT size="4">클래스 테스트</FONT>
<BR><BR>
<?php
  $newuser = new User();
  $newuser->print_hello();
  class User{
    public $name = '철수';
    public function print_hello(){
      print $this->name;
      print " 님 안녕하세요!<BR>";
    }
  }
?>
</BODY>
</HTML>
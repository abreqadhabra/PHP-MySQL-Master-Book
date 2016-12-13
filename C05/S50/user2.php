<?php
  $user = new User();
  class User{
    public $name = '철수';
    public function print_hello(){
      print $this->name;
      print "님 안녕하세요!<BR>";
    }
  }
?>
<?php

  class Member{
// 내용 생략
  }

  $member = new Member;
  $member->setID("1");
  $member->setLastname('당신의 성');
  $member->setFirstname('당신의 이름');
  $member->setEmail('당신의 메일주소');
  $member->setPassword('패스워드');
  print $member->getID()."<BR>";
  print $member->getLastname()."<BR>";
  print $member->getFirstname()."<BR>";
  print $member->getEmail()."<BR>";
  print $member->getPassword()."<BR>";
?>

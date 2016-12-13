<?php
  // 관련 파일을 읽어 들입니다.
  require_once 'memberclass.php';
  require_once 'membersclass.php';
  // 회원 데이터 Dummy 작성
  $member1 = new Member(1,"성１","이름１","email1@example.com","password1");
  $member2 = new Member(2,"성２","이름２","email2@example.com","password2");
  $member3 = new Member(3,"성３","이름３","email3@example.com","password3");
  $member4 = new Member(4,"성４","이름４","email4@example.com","password4");
  $member5 = new Member(5,"성５","이름５","email5@example.com","password5");
  // Members 클래스에 회원 데이터를 추가
  $members = new Members;
  $members->add($member1);
  $members->add($member2);
  $members->add($member3);
  $members->add($member4);
  $members->add($member5);
  // getIterator로부터 Iterator 취득
  $iterator = $members->getIterator();
  // 반복 처리
  foreach($iterator as $member){
    print $member->getId()." ";
    print $member->getLastname()." ";
    print $member->getFirstname()." ";
    print $member->getEmail()." ";
    print $member->getPassword()."<br>";
  }
?>
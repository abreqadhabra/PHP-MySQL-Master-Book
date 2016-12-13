<?php
// 関連ファイルを読み込みます。
require_once 'memberclass.php';
require_once 'membersclass.php';

// ダミーの会員データを作成
$member1 = new Member(1, "姓１", "名１", "email1@example.com", "password1");
$member2 = new Member(2, "姓２", "名２", "email2@example.com", "password2");
$member3 = new Member(3, "姓３", "名３", "email3@example.com", "password3");
$member4 = new Member(4, "姓４", "名４", "email4@example.com", "password4");
$member5 = new Member(5, "姓５", "名５", "email5@example.com", "password5");

// Membersクラスに会員データを追加
$members = new Members;
$members->add($member1);
$members->add($member2);
$members->add($member3);
$members->add($member4);
$members->add($member5);

// getIteratorによりイテレータを取得
$iterator = $members->getIterator();

// ループ処理
foreach($iterator as $member){
    print $member->getId()        . " ";
    print $member->getLastname()  . " ";
    print $member->getFirstname() . " ";
    print $member->getEmail()     . " ";
    print $member->getPassword()  . "<br>";
}


?>
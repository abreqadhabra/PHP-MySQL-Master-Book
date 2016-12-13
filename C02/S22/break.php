<?php
  $member[0] = "○철수";
  $member[1] = "○영희";
  $member[2] = "○길동";
  $member[3] = "○정자";
  $member[4] = "○희동";
  $i = 1;
  $limit = 3;
  foreach($member as $key => $value){
    if($i > $limit){
      print "반복을 빠져나옵니다.<BR>";
      break;
    }
    print "이름 : $value";
    print "<BR>";
    $i ++;
  }
?>
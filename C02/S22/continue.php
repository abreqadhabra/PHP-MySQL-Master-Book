<?php
  $member = array("name" => "○철수","tel" => "03-0000-0000","age" => 20,"tall" => 170);
  foreach($member as $key => $value){
    if($key == "name"){
      $title = "이름";
    }else{
      if($key == "age"){
        $title = "연령";
      }else{
        if($key == "tall"){
          $title = "신장";
        }else{
          print "처리를 건너뜁니다.<BR>";
          continue;
        }
      }
    }
    print "$title : $value";
    print "<BR>";
  }
?>
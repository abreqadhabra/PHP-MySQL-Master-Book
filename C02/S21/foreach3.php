<?php
  $member = array("name" => "○철수","age" => 20,"tall" => 170);
  foreach($member as $key => $value){
    if($key == "name"){
      $title = "이름";
    }else{
      if($key == "age"){
        $title = "연령";
      }else{
        if($key == "tall"){
          $title = "신장";
        }
      }
    }
    print "$title : $value";
    print "<BR>";
  }
?>
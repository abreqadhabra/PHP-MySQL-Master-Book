<?php
  $myage = 19;// 연령
  check_adult($myage);
  function check_adult($age){
    $adult_age = 20;// 비교를 위한 연령
    $adult_check = ($adult_age <= $age)?"어른":"아이";
    print $adult_check." 입니다.";
  }
?>
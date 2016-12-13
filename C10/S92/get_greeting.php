<?php
  print get_greeting();
  function get_greeting(){
    $greeting = "";
    $hour = date("H");
    if($hour >= 0 && $hour < 10){
      $greeting = 'Good Morning.';
    }else{
      if($hour >= 10 && $hour < 18){
        $greeting = 'Good Afternon';
      }else{
        $greeting = 'Good Evening';
      }
    }
    return $greeting;
  }
?>
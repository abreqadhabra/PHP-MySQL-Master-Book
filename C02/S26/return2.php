<?php
  list($year,$month,$day) = get_today();
  print $year.'년'.$month.'월'.$day.'일';
  function get_today(){
    $year = date('Y');
    $month = date('m');
    $day = date('d');
    return array($year,$month,$day);
  }
?>
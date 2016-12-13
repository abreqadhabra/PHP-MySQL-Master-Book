<?php
  $week = array("월","화","수","목","금","토","일");
  reset($week);
  while(list(,$value) = each($week)){
    print $value;
    print "<BR>";
  }
?>
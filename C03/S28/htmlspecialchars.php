<?php
  $string = '<a href="http://www.namgarambooks.co.kr/">남가람북스</a>';
  $result = htmlspecialchars($string,ENT_QUOTES);
  print $result;
?>
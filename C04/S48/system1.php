<?php
  header('Content-Type: text/html; charset=EUC-KR');
  $files = system("dir"); // Windows
  //$files = system("ls"); // Mac、Linux
  print "<BR>";
  print $files;
?>
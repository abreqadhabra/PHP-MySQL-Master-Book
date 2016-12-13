<?php
  $filelist = `ls -laF`;
  // $filelist = `dir`;
  print "<PRE>";
  print $filelist;
  print "</PRE>";
?>
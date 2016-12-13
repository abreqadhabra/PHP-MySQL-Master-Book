<?php
  if($dirhandle = opendir('.')){
    while(false !== ($filename = readdir($dirhandle))){
      print $filename."<BR>";
    }
    closedir($dirhandle);
  }
?>
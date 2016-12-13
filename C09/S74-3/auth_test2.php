<?php
  if(empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW'])){
    header("WWW-Authenticate: Basic realm=\"Member Only\"");
    header("HTTP/1.0 401 Unauthorized");
  }else{
    print $_SERVER['PHP_AUTH_USER']."<BR>";
    print $_SERVER['PHP_AUTH_PW'];
  }
?>
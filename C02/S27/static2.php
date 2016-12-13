<?php
  counter();
  counter();
  counter();
  counter();
  counter();
  function counter(){
    static $data = 0;
    print $data ++;
    print "<BR>";
  }
?>
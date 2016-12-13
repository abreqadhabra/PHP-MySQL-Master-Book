<?php
  // 실행하면 오류가 표시됩니다.
  class Test{
    public $str1 = '공개';
    private $str2 = '비밀';
  }
  $test = new Test();
  print $test->str1;
  print "<BR>";
  print $test->str2;
  print "<BR>";
?>
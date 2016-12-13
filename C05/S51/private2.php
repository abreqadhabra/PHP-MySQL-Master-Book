<?php
  class Test{
    public function TestPublic(){
      print "공개<BR>";
    }
    function TestNothing(){
      print "선언없음<BR>";
    }
    private function TestPrivate(){
      print "비밀<BR>";
    }
  }
  $test = new Test();
  $test->TestPublic();
  $test->TestNothing();
  $test->TestPrivate();// 이 부분만 오류가 됩니다.
?>

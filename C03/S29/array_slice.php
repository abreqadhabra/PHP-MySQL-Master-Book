<?php
  $data = array("A","B","C","D","E");
  print implode(',',$data).'<BR>';
  $result = array_slice($data,0,4);// A,B,C,D를 꺼냅니다.
  print implode(',',$result).'<BR>';
  $result = array_slice($data,- 3,1);// C를 꺼냅니다.
  print implode(',',$result).'<BR>';
  $result = array_slice($data,3,- 1);// D를 꺼냅니다.
  print implode(',',$result).'<BR>';
  $result = array_slice($data,2);    // C,D,E를 꺼냅니다.
  print implode(',',$result).'<BR>';
?>

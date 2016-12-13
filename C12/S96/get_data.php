<?php
  print htmlspecialchars($_GET['data1'],ENT_QUOTES);
  print "<br>";
  print htmlspecialchars($_GET['data2'],ENT_QUOTES);
?>

<!--http://127.0.0.1/C12/S97/get_data.php?data1=one&data2=two-->
<?php
  print '여러분의 위치정보를 확인합니다.<br>';
  print "위도:".htmlspecialchars($_GET['latitude'],ENT_QUOTES);
  print "<br>";
  print "경도: ".htmlspecialchars($_GET['longitude'],ENT_QUOTES);
  $param = htmlspecialchars($_GET['latitude'].','.$_GET['longitude'],ENT_QUOTES);
?>
<br>
<a href="https://maps.google.com/maps?q=<?=$param?>">Google Map에서 확인</a>

<!--
<?php
  $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=왕십리역&sensor=false');
  $output = json_decode($geocode);
  $latitude = $output->results[0]->geometry->location->lat;
  $longitude = $output->results[0]->geometry->location->lng;
  print "<br>".$geocode;
  $param = htmlspecialchars($latitude.','.$longitude,ENT_QUOTES);
  print "<br>".$param;
?>

<br>
<a href="https://maps.google.com/maps?q=<?=$param?>">Google Map에서 확인</a>
<br>
<a href="https://maps.google.com/maps?q=37.561982,127.03726">Google Map에서 확인</a>

http://127.0.0.1/C12/S97/get_data1.php?latitude=37.561982&longitude=127.03726

-->
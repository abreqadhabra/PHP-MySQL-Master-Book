<?php
print 'あなたの位置情報を確認しました。<br>';
print "緯度: " . htmlspecialchars($_GET['latitude'], ENT_QUOTES);
print "<br>";
print "経度: " . htmlspecialchars($_GET['longitude'], ENT_QUOTES);
$param = htmlspecialchars($_GET['latitude'] . ',' . $_GET['longitude'], ENT_QUOTES);
?>
<br>
<a href="https://maps.google.com/maps?q=<?=$param?>">Google Mapで確認</a>

<?php
  print '여러분의 위치정보를 탐색 중...<br>';
  $url = 'http://localhost/C12/S97/get_data1.php';
?>
<script>
  navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
  function successCallback(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    location.href = '<?=$url?>?latitude=' + latitude + '&longitude=' + longitude;
  }
  function errorCallback(error) {
    alert('error!');
  }
</script>
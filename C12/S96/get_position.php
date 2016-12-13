<?php
  // 여기는 PHP를 기술합니다.
?>
<script>
  navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
  function successCallback(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var message = "위도:" + latitude + "\n" + "경도: " + longitude;
    alert(message);
  }
  function errorCallback(error) {
    alert('error!');
  }
</script>
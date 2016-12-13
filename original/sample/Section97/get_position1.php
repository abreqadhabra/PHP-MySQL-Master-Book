<?php
print 'あなたの位置情報を探索中....<br>';
$url = 'http://localhost/get_data1.php';

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
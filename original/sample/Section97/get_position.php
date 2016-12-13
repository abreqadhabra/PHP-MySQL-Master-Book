<?php

// ここはPHPを記述します。

?>
<script>
    navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    function successCallback(position) { 
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var message = "緯度: " + latitude + "\n" +"経度: " + longitude;
        alert(message);

    }
    function errorCallback(error) { 
        alert('error!');
    }
</script>
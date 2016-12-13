<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
<?php
        
    $password = 'system';
    
    print get_hashed_password($password);
        
    function get_hashed_password($password) {
        // コストパラメーター
        $cost = 10;
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt = sprintf("$2y$%02d$", $cost) . $salt;
        $hash = crypt($password, $salt);
        return $hash;
    }
?>
    </body>
</html>
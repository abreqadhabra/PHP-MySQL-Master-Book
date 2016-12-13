<html>
<head><title>PHP TEST</title></head>
<body>
<?php

// ユーザ名sampleをsampleeとして接続エラーを発生します。

try {
  $pdo = new PDO('mysql:host=localhost;dbname=sampledb;charset=utf8', 'samplee','password');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  print "接続しました";
} catch(PDOException $Exception) {
  die('接続エラー :' . $Exception->getMessage());
}

?>

</body>
</html>
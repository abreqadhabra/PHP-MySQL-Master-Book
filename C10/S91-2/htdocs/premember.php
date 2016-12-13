<?php
  define('_ROOT_DIR',__DIR__.'/');
  require_once _ROOT_DIR.'../php_libs2/init.php';
  $controller = new PrememberController();
  $controller->run();
  exit;
?>
<?php
/*************************************************
 * 会員本登録用スクリプト
 * 
 */

define('_ROOT_DIR', __DIR__ . '/');
require_once _ROOT_DIR . '../php_libs/init.php';
$controller = new PrememberController();
$controller->run();

exit;


?>

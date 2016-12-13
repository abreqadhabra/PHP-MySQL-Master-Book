<?php
/*************************************************
 * 会員実行スクリプト
 * 
 */

define('_ROOT_DIR', __DIR__ . '/');
require_once _ROOT_DIR . '../php_libs/init.php';
$controller = new MemberController();
$controller->run();

exit;


?>

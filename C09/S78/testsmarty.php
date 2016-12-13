<?php
  define('_ROOT_DIR',__DIR__.'/');
  require_once _ROOT_DIR.'php_libs/init.php';

  $smarty = new Smarty;
  $smarty->template_dir = _SMARTY_TEMPLATES_DIR;
  $smarty->compile_dir = _SMARTY_TEMPLATES_C_DIR;
  $smarty->config_dir = _SMARTY_CONFIG_DIR;
  $smarty->cache_dir = _SMARTY_CACHE_DIR;
  $smarty->assign("title","타이틀명");

  $file = 'testsmarty.tpl';

  $smarty->display($file);
?>

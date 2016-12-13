<?php
define('_ROOT_DIR', __DIR__ . '/');
require_once _ROOT_DIR . '../php_libs2/init.php';

$smarty = new Smarty;
$smarty->template_dir = _SMARTY_TEMPLATES_DIR;
$smarty->compile_dir  = _SMARTY_TEMPLATES_C_DIR;
$smarty->config_dir   = _SMARTY_CONFIG_DIR;
$smarty->cache_dir    = _SMARTY_CACHE_DIR;

$form = new HTML_QuickForm();
$form->addElement('text','name','名前', ['size' => 30]);
$form->addRule('name', '名前を入力してください。', 'required', null, 'server');

if ($form->validate()){ $form->freeze();}

$form->addElement('submit','submit', '送信');

$renderer= new HTML_QuickForm_Renderer_ArraySmarty($smarty);
$form->accept($renderer);
$smarty->assign('form', $renderer->toArray());


$file = 'testhqf.tpl';
$smarty->display($file);
?>

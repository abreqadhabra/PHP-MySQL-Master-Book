<?php
define('_ROOT_DIR', __DIR__ . '/');
require_once _ROOT_DIR . '../php_libs2/init.php';

$smarty = new Smarty;
$smarty->template_dir = _SMARTY_TEMPLATES_DIR;
$smarty->compile_dir  = _SMARTY_TEMPLATES_C_DIR;
$smarty->config_dir   = _SMARTY_CONFIG_DIR;
$smarty->cache_dir    = _SMARTY_CACHE_DIR;

// Authクラスの読み込み
$auth = new Auth;
$auth->set_authname(_MEMBER_AUTHINFO);
$auth->set_sessname(_MEMBER_SESSNAME);
$auth->start();

if (!empty($_POST['type']) &&  $_POST['type'] == 'authenticate' ) {
    // 認証機能
    $MemberModel = new MemberModel();
    $userdata = $MemberModel->get_authinfo($_POST['username']);
    if(!empty($userdata['password']) && $auth->check_password($_POST['password'], $userdata['password'])){
        $auth->auth_ok($userdata);
    } else {
      // 何もしません
    }
}else if( !empty($_GET['type']) && $_GET['type'] == 'logout'){
   $auth->logout();
}


if($auth->check()){
    // 認証済み
    $smarty->assign("title", "会員ページ");
    $file = 'testauth.tpl';

}else{
    // 未認証
    $smarty->assign("title", "ゲストページ");
    $smarty->assign("type", "authenticate");
    $file = 'testlogin.tpl';

    $form = new HTML_QuickForm();
    $form->addElement('text', 'username', 'ユーザー名', ['size' => 15, 'maxlength' => 50]);
    $form->addElement('password', 'password', 'パスワード', ['size' => 15, 'maxlength' => 50]);
    $form->addElement('submit','submit','ログイン');
    $renderer= new HTML_QuickForm_Renderer_ArraySmarty($smarty);
    $form->accept($renderer);
    $smarty->assign('form', $renderer->toArray());
}


$smarty->display($file);
?>


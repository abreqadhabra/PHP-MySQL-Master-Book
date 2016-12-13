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

    // DBに接続
    $db_user = "sample";	// ユーザー名
    $db_pass = "password";	// パスワード
    $db_host = "localhost";	// ホスト名
    $db_name = "sampledb";	// データベース名
    $db_type = "mysql";	// データベースの種類

    $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

    try {
      $pdo = new PDO($dsn, $db_user,$db_pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch(PDOException $Exception) {
      die('エラー :' . $Exception->getMessage());
    }

    // ユーザーネームで検索
    $userdata = [];
    try {
        $sql= "SELECT * FROM member WHERE username = :username ";
        $stmh = $pdo->prepare($sql);
        $stmh->bindValue(':username',  $_POST['username'],  PDO::PARAM_STR );
        $stmh->execute();
        while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
            foreach( $row as $key => $value){
                $userdata[$key] = $value;
            }
        }
    } catch (PDOException $Exception) {
        print "エラー：" . $Exception->getMessage();
    }
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


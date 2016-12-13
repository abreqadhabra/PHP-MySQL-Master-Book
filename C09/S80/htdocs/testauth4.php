<?php
  define('_ROOT_DIR',__DIR__.'/');
  require_once _ROOT_DIR.'../php_libs/init.php';
  $smarty = new Smarty;
  $smarty->template_dir = _SMARTY_TEMPLATES_DIR;
  $smarty->compile_dir = _SMARTY_TEMPLATES_C_DIR;
  $smarty->config_dir = _SMARTY_CONFIG_DIR;
  $smarty->cache_dir = _SMARTY_CACHE_DIR;
  // Auth 클래스 읽어들이기
  $auth = new Auth;
  $auth->set_authname(_MEMBER_AUTHINFO);
  $auth->set_sessname(_MEMBER_SESSNAME);
  $auth->start();
  if(!empty($_POST['type']) && $_POST['type'] == 'authenticate'){
    // 인증기능
    $MemberModel = new MemberModel();
    $userdata = $MemberModel->get_authinfo($_POST['username']);
    if(!empty($userdata['password']) && $auth->check_password($_POST['password'],$userdata['password'])){
      $auth->auth_ok($userdata);
    }else{
      // 아무것도 하지 않습니다.
    }
  }else{
    if(!empty($_GET['type']) && $_GET['type'] == 'logout'){
      $auth->logout();
    }
  }
  if($auth->check()){
    // 인증완료
    $smarty->assign("title","회원 페이지");
    $file = 'testauth.tpl';
  }else{
    // 미인증
    $smarty->assign("title","게스트 페이지");
    $smarty->assign("type","authenticate");
    $file = 'testlogin.tpl';
    $form = new HTML_QuickForm();
    $form->addElement('text','username','사용자명',['size' => 15,'maxlength' => 50]);
    $form->addElement('password','password','패스워드',['size' => 15,'maxlength' => 50]);
    $form->addElement('submit','submit','로그인');
    $renderer = new HTML_QuickForm_Renderer_ArraySmarty($smarty);
    $form->accept($renderer);
    $smarty->assign('form',$renderer->toArray());
  }
  $smarty->display($file);
?>


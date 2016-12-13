<?php
  define('_ROOT_DIR',__DIR__.'/');
  require_once _ROOT_DIR.'../php_libs/init.php';
  $smarty = new Smarty;
  $smarty->template_dir = _SMARTY_TEMPLATES_DIR;
  $smarty->compile_dir = _SMARTY_TEMPLATES_C_DIR;
  $smarty->config_dir = _SMARTY_CONFIG_DIR;
  $smarty->cache_dir = _SMARTY_CACHE_DIR;
  // Auth 클래스를 읽어들임
  $auth = new Auth;
  $auth->set_authname(_MEMBER_AUTHINFO);
  $auth->set_sessname(_MEMBER_SESSNAME);
  $auth->start();
  if(!empty($_POST['type']) && $_POST['type'] == 'authenticate'){
    // 인증기능
    // DB 접속
    $db_user = "sample";    // 사용자명
    $db_pass = "password";    // 패스워드
    $db_host = "localhost";    // 호스트명
    $db_name = "sampledb";    // 데이터베이스명
    $db_type = "mysql";    // 데이터베이스 종류
    $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
    try{
      $pdo = new PDO($dsn,$db_user,$db_pass);
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    }catch(PDOException $Exception){
      die('오류:'.$Exception->getMessage());
    }
    // 사용자홈에서 검색
    $userdata = [];
    try{
      $sql = "SELECT * FROM member WHERE username = :username ";
      $stmh = $pdo->prepare($sql);
      $stmh->bindValue(':username',$_POST['username'],PDO::PARAM_STR);
      $stmh->execute();
      while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
        foreach($row as $key => $value){
          $userdata[$key] = $value;
        }
      }
    }catch(PDOException $Exception){
      print "오류:".$Exception->getMessage();
    }
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
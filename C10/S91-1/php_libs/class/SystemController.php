<?php
  class SystemController extends BaseController{

    public function run(){
      // 세션 시작 인증을 이용합니다.
      $this->auth = new Auth();
      $this->auth->set_authname(_SYSTEM_AUTHINFO);
      $this->auth->set_sessname(_SYSTEM_SESSNAME);
      $this->auth->start();
      if(!$this->auth->check() && $this->type != 'authenticate'){
        // 미인증
        $this->type = 'login';
      }
      // 공용 템플릿등을 이 flag로 관리용으로 바꿉니다.
      $this->is_system = true;
      // 회원 화면을 표시하기 위해 MemberController를 이용합니다.
      $MemberController = new MemberController($this->is_system);
      switch($this->type){
        case "login":
          $this->screen_login();
          break;
        case "logout":
          $this->auth->logout();
          $this->screen_login();
          break;
        case "modify":
          $MemberController->screen_modify($this->auth);
          break;
        case "delete":
          $MemberController->screen_delete();
          break;
        case "list":
          $this->screen_list();
          break;
        case "regist":
          $MemberController->screen_regist($this->auth);
          break;
        case "authenticate":
          $this->do_authenticate();
          break;
        case "notice":
          $NoticeController = new NoticeController();
          $NoticeController->screen_modify();
          break;
        default:
          $this->screen_top();
      }
    }

    private function screen_login(){
      $this->form->addElement('text','username','사용자명',['size' => 15,'maxlength' => 50]);
      $this->form->addElement('password','password','패스워드',['size' => 15,'maxlength' => 50]);
      $this->form->addElement('submit','submit','로그인');
      $this->next_type = 'authenticate';
      $this->title = '로그인화면';
      $this->file = "system_login.tpl";
      $this->view_display();
    }

    private function screen_list(){
      $disp_search_key = "";
      $sql_search_key = "";
      // 세션변수의 처리
      unset($_SESSION[_MEMBER_AUTHINFO]);
      if(isset($_POST['search_key']) && $_POST['search_key'] != ""){
        unset($_SESSION['pageID']);
        $_SESSION['search_key'] = $_POST['search_key'];
        $disp_search_key = htmlspecialchars($_POST['search_key'],ENT_QUOTES);
        $sql_search_key = $_POST['search_key'];
      }else{
        if(isset($_POST['submit']) && $_POST['submit'] == "검색하기"){
          unset($_SESSION['search_key']);
        }else{
          if(isset($_SESSION['search_key'])){
            $disp_search_key = htmlspecialchars($_SESSION['search_key'],ENT_QUOTES);
            $sql_search_key = $_SESSION['search_key'];
          }
        }
      }
      // 데이터베이스를 조작합니다.
      $MemberModel = new MemberModel();
      list($data,$count) = $MemberModel->get_member_list($sql_search_key);
      list($data,$links) = $this->make_page_link($data);
      $this->view->assign('count',$count);
      $this->view->assign('data',$data);
      $this->view->assign('search_key',$disp_search_key);
      $this->view->assign('links',$links['all']);
      $this->title = '관리 - 회원목록화면';
      $this->file = 'system_list.tpl';
      $this->view_display();
    }

    public function do_authenticate(){
      // 데이터베이스를 조작합니다.
      $SystemModel = new SystemModel();
      $userdata = $SystemModel->get_authinfo($_POST['username']);
      if(!empty($userdata['password']) && $this->auth->check_password($_POST['password'],$userdata['password'])){
        $this->auth->auth_ok($userdata);
        $this->screen_top();
      }else{
        $this->auth_error_mess = $this->auth->auth_no();
        $this->screen_login();
      }
    }

    private function screen_top(){
      unset($_SESSION['search_key']);
      unset($_SESSION[_MEMBER_AUTHINFO]);
      unset($_SESSION['pageID']);
      $this->title = '관리 상단 화면';
      $this->file = 'system_top.tpl';
      $this->view_display();
    }
  }
?>

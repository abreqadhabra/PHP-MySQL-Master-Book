<?php
  class MemberController extends BaseController{

    public function run(){
      // 세션 시작 인증에 이용합니다.
      $this->auth = new Auth();
      $this->auth->set_authname(_MEMBER_AUTHINFO);
      $this->auth->set_sessname(_MEMBER_SESSNAME);
      $this->auth->start();
      if($this->auth->check()){
        // 인증완료
        $this->menu_member();
      }else{
        // 미인증
        $this->menu_guest();
      }
    }

    public function menu_member(){
      switch($this->type){
        case "logout":
          $this->auth->logout();
          $this->screen_login();
          break;
        case "modify":
          $this->screen_modify();
          break;
        case "delete":
          $this->screen_delete();
          break;
        default:
          $this->screen_top();
      }
    }

    public function menu_guest(){
      switch($this->type){
        case "regist":
          $this->screen_regist();
          break;
        case "authenticate":
          $this->do_authenticate();
          break;
        default:
          $this->screen_login();
      }
    }

    public function screen_login(){
      $this->form->addElement('text','username','사용자명',['size' => 15,'maxlength' => 50]);
      $this->form->addElement('password','password','패스워드',['size' => 15,'maxlength' => 50]);
      $this->form->addElement('submit','submit','로그인');
      $this->title = '로그인 화면';
      $this->next_type = 'authenticate';
      $this->file = "login.tpl";
      $this->view_display();
    }

    public function screen_modify($auth = ""){
      $btn = "";
      $btn2 = "";
      $this->file = "memberinfo_form.tpl";
      // 데이터베이스를 조작합니다.
      $MemberModel = new MemberModel();
      $PrememberModel = new PrememberModel();
      if($this->is_system && $this->action == "form"){
        $_SESSION[_MEMBER_AUTHINFO] = $MemberModel->get_member_data_id($_GET['id']);
      }
      // 폼 요소의 기본값을 설정
      $date_defaults = [
        'Y' => substr($_SESSION[_MEMBER_AUTHINFO]['birthday'],0,4),
        'm' => substr($_SESSION[_MEMBER_AUTHINFO]['birthday'],4,2),
        'd' => substr($_SESSION[_MEMBER_AUTHINFO]['birthday'],6,2),
      ];
      $this->form->setDefaults([
        'username'   => $_SESSION[_MEMBER_AUTHINFO]['username'],
        'last_name'  => $_SESSION[_MEMBER_AUTHINFO]['last_name'],
        'first_name' => $_SESSION[_MEMBER_AUTHINFO]['first_name'],
        'prefecture' => $_SESSION[_MEMBER_AUTHINFO]['prefecture'],
        'birthday'   => $date_defaults,
      ]);
      $this->make_form_controle();
      // 폼의 타탕성 검증
      if(!$this->form->validate()){
        $this->action = "form";
      }
      if($this->action == "form"){
        $this->title = '수정화면';
        $this->next_type = 'modify';
        $this->next_action = 'confirm';
        $btn = '확인화면으로';
      }else{
        if($this->action == "confirm"){
          $this->title = '확인화면';
          $this->next_type = 'modify';
          $this->next_action = 'complete';
          $this->form->freeze();
          $btn = '수정하기';
          $btn2 = '돌아가기';
        }else{
          if($this->action == "complete" && isset($_POST['submit2']) && $_POST['submit2'] == '되돌아가기'){
            $this->title = '수정화면';
            $this->next_type = 'modify';
            $this->next_action = 'confirm';
            $btn = '확인화면으로';
          }else{
            if($this->action == "complete" && isset($_POST['submit']) && $_POST['submit'] == '수정하기'){
              $userdata = $this->form->getSubmitValues();
              if(($MemberModel->check_username($userdata) || $PrememberModel->check_username($userdata)) && ($_SESSION[_MEMBER_AUTHINFO]['username'] != $userdata['username'])){
                $this->next_type = 'modify';
                $this->next_action = 'confirm';
                $this->title = '수정화면';
                $this->message = "메일 어드레스는 등록 완료입니다.";
                $btn = '확인화면으로';
              }else{
                $this->title = '수정완료 화면';
                $userdata['id'] = $_SESSION[_MEMBER_AUTHINFO]['id'];
                // 시스템측에서 이용하는 경우에 사용
                if($this->is_system && is_object($auth)){
                  $userdata['password'] = $auth->get_hashed_password($userdata['password']);
                }else{
                  $userdata['password'] = $this->auth->get_hashed_password($userdata['password']);
                }
                $userdata['birthday'] = sprintf("%04d%02d%02d",$userdata['birthday']['Y'],$userdata['birthday']['m'],$userdata['birthday']['d']);
                $MemberModel->modify_member($userdata);
                $this->message = "회원정보를 수정하였습니다.";
                $this->file = "message.tpl";
                if($this->is_system){
                  unset($_SESSION[_MEMBER_AUTHINFO]);
                }else{
                  $_SESSION[_MEMBER_AUTHINFO] = $MemberModel->get_member_data_id($_SESSION[_MEMBER_AUTHINFO]['id']);
                }
              }
            }
          }
        }
      }
      $this->form->addElement('submit','submit',$btn);
      $this->form->addElement('submit','submit2',$btn2);
      $this->form->addElement('reset','reset','초기화');
      $this->view_display();
    }

    public function screen_delete(){
      // 데이터베이스를 조작합니다.
      $MemberModel = new MemberModel();
      if($this->action == "confirm"){
        if($this->is_system){
          $_SESSION[_MEMBER_AUTHINFO] = $MemberModel->get_member_data_id($_GET['id']);
          $this->message = "[삭제하기]를 클릭하면 ";
          $this->message .= htmlspecialchars($_SESSION[_MEMBER_AUTHINFO]['last_name'],ENT_QUOTES);
          $this->message .= htmlspecialchars($_SESSION[_MEMBER_AUTHINFO]['first_name'],ENT_QUOTES);
          $this->message .= "님의 회원정보를 삭제합니다.";
          $this->form->addElement('submit','submit',"삭제하기");
        }else{
          $this->message = "[탈퇴하기]를 클릭하면 회원정보를 삭제하고 탈퇴합니다.";
          $this->form->addElement('submit','submit',"탈퇴하기");
        }
        $this->next_type = 'delete';
        $this->next_action = 'complete';
        $this->title = '삭제확인화면';
        $this->file = 'delete_form.tpl';
      }else{
        if($this->action == "complete"){
          $MemberModel->delete_member($_SESSION[_MEMBER_AUTHINFO]['id']);
          if($this->is_system){
            unset($_SESSION[_MEMBER_AUTHINFO]);
          }else{
            $this->auth->logout();
          }
          $this->message = "회원정보를 삭제하였습니다.";
          $this->title = '삭제완료화면';
          $this->file = 'message.tpl';
        }
      }
      $this->view_display();
    }

    public function screen_top(){
      $NoticeModel = new NoticeModel;
      $noticedata = $NoticeModel->get_notice_data_id('1');
      $this->view->assign('subject',$noticedata['subject']);
      $this->view->assign('body',$noticedata['body']);
      $this->view->assign('reg_date',$noticedata['reg_date']);
      $this->view->assign('last_name',$_SESSION[_MEMBER_AUTHINFO]['last_name']);
      $this->view->assign('first_name',$_SESSION[_MEMBER_AUTHINFO]['first_name']);
      $this->title = '회원 상단 화면';
      $this->file = 'member_top.tpl';
      $this->view_display();
    }

    public function screen_regist($auth = ""){
      $btn = "";
      $btn2 = "";
      $this->file = "memberinfo_form.tpl"; // 기본값
      // 폼 요소의 기본값을 설정
      $date_defaults = ['Y' => date('Y'),'m' => date('m'),'d' => date('d'),];
      $this->form->setDefaults(['birthday' => $date_defaults]);
      $this->make_form_controle();
      // 폼의 타당성 검증
      if(!$this->form->validate()){
        $this->action = "form";
      }
      if($this->action == "form"){
        $this->title = '신규등록화면';
        $this->next_type = 'regist';
        $this->next_action = 'confirm';
        $btn = '확인화면으로';
      }else{
        if($this->action == "confirm"){
          $this->title = '확인화면';
          $this->next_type = 'regist';
          $this->next_action = 'complete';
          $this->form->freeze();
          $btn = '등록하기';
          $btn2 = '돌아가기';
        }else{
          if($this->action == "complete" && isset($_POST['submit2']) && $_POST['submit2'] == '돌아가기'){
            $this->title = '신규등록 화면';
            $this->next_type = 'regist';
            $this->next_action = 'confirm';
            $btn = '확인화면으로';
          }else{
            if($this->action == "complete" && isset($_POST['submit']) && $_POST['submit'] == '등록하기'){
              // 데이터베이스를 조작합니다.
              $PrememberModel = new PrememberModel();
              // 데이터베이스를 조작합니다.
              $MemberModel = new MemberModel();
              $userdata = $this->form->getSubmitValues();
              if($MemberModel->check_username($userdata) || $PrememberModel->check_username($userdata)){
                $this->title = '신규등록 화면';
                $this->message = "등록된 메일 주소입니다.";
                $this->next_type = 'regist';
                $this->next_action = 'confirm';
                $btn = '확인화면으로';
              }else{
                // 시스템측에서 이용하는 경우에 사용
                if($this->is_system && is_object($auth)){
                  $userdata['password'] = $auth->get_hashed_password($userdata['password']);
                }else{
                  $userdata['password'] = $this->auth->get_hashed_password($userdata['password']);
                }
                $userdata['birthday'] = sprintf("%04d%02d%02d",$userdata['birthday']['Y'],$userdata['birthday']['m'],$userdata['birthday']['d']);
                if($this->is_system){
                  $MemberModel->regist_member($userdata);
                  $this->title = '등록완료 화면';
                  $this->message = "등록을 완료하였습니다.";
                }else{
                  $userdata['link_pass'] = hash('sha256',uniqid(rand(),1));
                  $PrememberModel->regist_premember($userdata);
                  $this->mail_to_premember($userdata);
                  $this->title = '메일 송신완료 화면';
                  $this->message = "등록된 메일주소로 확인을 위한 메일을 발송하였습니다.<BR>";
                  $this->message .= "메일 본문에 기재되어 있는 URL에 접근하여 등록을 완료하세요.<BR>";
                }
                $this->file = "message.tpl";
              }
            }
          }
        }
      }
      $this->form->addElement('submit','submit',$btn);
      $this->form->addElement('submit','submit2',$btn2);
      $this->form->addElement('reset','reset','초기화');
      $this->view_display();
    }

    public function mail_to_premember($userdata){
      $path = pathinfo(_SCRIPT_NAME)['dirname'];
      $to = $userdata['username'];
      $subject = "회원정보의 확인";
      $message = <<<EOM
    {$userdata['username']}님

    회원등록에 감사드립니다.
    아래의 링크에 접속하여 회원등록을 완료하세요.

    http://{$_SERVER['SERVER_NAME']}{$path}/premember.php?username={$userdata['username']}&link_pass={$userdata['link_pass']}

    --
    회원시스템

EOM;
      $add_header = "";
      //$add_header .= "From: xxxx@xxxxxxx\nCc: xxxx@xxxxxxx";
      mb_send_mail($to,$subject,$message,$add_header);
    }

    public function do_authenticate(){
      // 데이터베이스를 조작합니다.
      $MemberModel = new MemberModel();
      $userdata = $MemberModel->get_authinfo($_POST['username']);
      if(!empty($userdata['password']) && $this->auth->check_password($_POST['password'],$userdata['password'])){
        $this->auth->auth_ok($userdata);
        $this->screen_top();
      }else{
        $this->auth_error_mess = $this->auth->auth_no();
        $this->screen_login();
      }
    }
  }

?>
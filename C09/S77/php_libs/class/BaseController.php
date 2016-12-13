<?php
  class BaseController{

    protected $type;
    protected $action;
    protected $next_type;
    protected $next_action;
    protected $file;
    protected $form;
    protected $renderer;
    protected $auth;
    protected $is_system = false;
    protected $view;
    protected $title;
    protected $message;
    protected $auth_error_mess;
    protected $login_state;
    private $debug_str;

    public function __construct($flag = false){
      $this->set_system($flag);
      $this->view_initialize();
    }

    public function set_system($flag){
      $this->is_system = $flag;
    }

    private function view_initialize(){
      $this->view = new Smarty;
      // Smarty관련 디렉터리의 설정
      $this->view->template_dir = _SMARTY_TEMPLATES_DIR;
      $this->view->compile_dir = _SMARTY_TEMPLATES_C_DIR;
      $this->view->config_dir = _SMARTY_CONFIG_DIR;
      $this->view->cache_dir = _SMARTY_CACHE_DIR;
      // 입력 확인용 클래스
      $this->form = new HTML_QuickForm();
      // JavaScript의 메시지를 한국어로 수정
      $this->form->setJsWarnings("입력 오류입니다.。","항목을 수정하세요");
      // HTML_QickForm과 Smarty를 사용하기 위한 클래스
      $this->renderer = new HTML_QuickForm_Renderer_ArraySmarty($this->view);
      // 리퀘스트 변수 type과 action에서 동작을 결정합니다.
      if(isset($_REQUEST['type'])){
        $this->type = $_REQUEST['type'];
      }
      if(isset($_REQUEST['action'])){
        $this->action = $_REQUEST['action'];
      }
      // 공통의 변수
      $this->view->assign('is_system',$this->is_system);
      $this->view->assign('SCRIPT_NAME',_SCRIPT_NAME);
      $this->view->assign('add_pageID',$this->add_pageID());
    }

    public function add_pageID(){
      if(!($this->is_system && $this->type == 'list')){
        return;
      }
      $add_pageID = "";
      if(isset($_GET['pageID']) && $_GET['pageID'] != ""){
        $add_pageID = '&pageID='.$_GET['pageID'];
        $_SESSION['pageID'] = $_GET['pageID'];
      }else{
        if(isset($_SESSION['pageID']) && $_SESSION['pageID'] != ""){
          $add_pageID = '&pageID='.$_SESSION['pageID'];
        }
      }
      return $add_pageID;
    }

    public function make_form_controle(){
      $PrefectureModel = new PrefectureModel;
      $prefecture_array = $PrefectureModel->get_prefecture_data();
      $options = ['format' => 'Ymd','minYear' => 1950,'maxYear' => date("Y"),];
      $this->form->addElement('text','username','메일（사용자 홈）',['size' => 30]);
      $this->form->addElement('text','password','패스워드',['size' => 30]);
      $this->form->addElement('text','last_name','성',['size' => 30]);
      $this->form->addElement('text','first_name','이름',['size' => 30]);
      $this->form->addElement('date','birthday','생일',$options);
      $this->form->addElement('select','prefecture','행정구역',$prefecture_array);
      $this->form->addRule('username','메일 주소를 입력하세요.','required',null,'server');
      $this->form->addRule('username','잘못된 메일 주소 형식입니다.','email',null,'server');
      $this->form->addRule('password','패스워드를 입력하세요','required',null,'server');
      $this->form->addRule('password','패스워드는 8~16자 범위로 입력하세요.','rangelength',[8,50],'server');
      $this->form->addRule('password','패스워드는 영/숫자, 기호(_ - ! ? # $ % & )를 사용하세요','regex','/^[a-zA-z0-9_\-!?#$%&]*$/','server');
      $this->form->addRule('last_name','성을 입력하세요.','required',null,'server');
      $this->form->addRule('first_name','이름을 입력하세요.','required',null,'server');
      $this->form->applyFilter('__ALL__','trim');
    }

    public function make_page_link($data){
      // Slinding을 사용하는 경우
      //require_once 'Pager/Sliding.php';
      // Pager를 사용하는 경우
      require_once 'Pager/Jumping.php';
      $params = ['mode' => 'Jumping','perPage' => 10,'delta' => 10,'itemData' => $data];
      // PHP 5에서 Slinding를 사용하는 경우
      //$pager = new Pager_Sliding($params);
      // PHP 5에서 Pager를 사용하는 경우
      $pager = new Pager_Jumping($params);
      $data = $pager->getPageData();
      $links = $pager->getLinks();
      return [$data,$links];
    }

    protected function view_display(){
      // 세션변수등의 내용을 표시
      $this->debug_display();
      // 로그인 상황을 표시
      $this->disp_login_state();
      $this->view->assign('title',$this->title);
      $this->view->assign('auth_error_mess',$this->auth_error_mess);
      $this->view->assign('message',$this->message);
      $this->view->assign('disp_login_state',$this->login_state);
      $this->view->assign('type',$this->next_type);
      $this->view->assign('action',$this->next_action);
      $this->view->assign('debug_str',$this->debug_str);
      $this->form->accept($this->renderer);
      $this->view->assign('form',$this->renderer->toArray());
      $this->view->display($this->file);
    }

    public function debug_display(){
      if(_DEBUG_MODE){
        $this->debug_str = "";
        if(isset($_SESSION)){
          $this->debug_str .= '<BR><BR>$_SESSION<BR>';
          $this->debug_str .= var_export($_SESSION,true);
        }
        if(isset($_POST)){
          $this->debug_str .= '<BR><BR>$_POST<BR>';
          $this->debug_str .= var_export($_POST,true);
        }
        if(isset($_GET)){
          $this->debug_str .= '<BR><BR>$_GET<BR>';
          $this->debug_str .= var_export($_GET,true);
        }
        // smarty의 디버그 모드 설정 팝업 윈도우에 템플릿 내의 변수를 표시합니다.
        $this->view->debugging = _DEBUG_MODE;
      }
    }

    private function disp_login_state(){
      if(is_object($this->auth) && $this->auth->check()){
        $this->login_state = ($this->is_system)?'관리자로 로그인':'회원으로 로그인';
      }
    }
  }
?>

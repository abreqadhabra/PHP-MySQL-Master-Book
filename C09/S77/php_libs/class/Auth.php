<?php
  class Auth{

    // 세션에 대한 처리
    private $authname; // 인증정보명
    private $sessname; // 세션명

    public function __construct(){
    }

    public function set_authname($name){
      $this->authname = $name;
    }

    public function get_authname(){
      return $this->authname;
    }

    public function set_sessname($name){
      $this->sessname = $name;
    }

    public function get_sessname(){
      return $this->sessname;
    }

    public function start(){
      // 세션이 이미 시작되어 있는 경우에는 아무것도 하지 않음.
      if(session_status() === PHP_SESSION_ACTIVE){
        return;
      }
      if($this->sessname != ""){
        session_name($this->sessname);
      }
      // 세션 시작
      session_start();
    }

    // 인증정보의 확인
    public function check(){
      if(!empty($_SESSION[$this->get_authname()]) && $_SESSION[$this->get_authname()]['id'] >= 1){
        return true;
      }
    }

    // 인증정보의 파기
    public function logout(){
      // 세션 변수를 비움
      $_SESSION = [];
      //  쿠키를 삭제
      if(ini_get("session.use_cookies")){
        $params = session_get_cookie_params();
        setcookie(session_name(),'',time() - 42000,$params["path"],$params["domain"],$params["secure"],$params["httponly"]);
      }
      // 세션을 파기
      session_destroy();
    }

    public function get_hashed_password($password){
      // cost 파라미터
      // 04 부터 31 까지의 범위로 수치가 커지면 견고해지지만 시스템에 부하가 걸립니다.
      $cost = 10;
      // 임의의 문자열을 생성합니다.
      $salt = strtr(base64_encode(mcrypt_create_iv(16,MCRYPT_DEV_URANDOM)),'+','.');
      // salt를 생성합니다.
      $salt = sprintf("$2y$%02d$",$cost).$salt;
      $hash = crypt($password,$salt);

      return $hash;
    }

    public function check_password($password,$hashed_password){
      if(crypt($password,$hashed_password) == $hashed_password){
        return true;
      }
    }

    //인증 정보의 취득
    public function auth_ok($userdata){
      session_regenerate_id(true);
      $_SESSION[$this->get_authname()] = $userdata;
    }

    // 패스워드가 일치하면 true를 돌려줍니다.
    public function auth_no(){
      return '사용자명이나 패스워드가 틀립니다.'."\n";
    }
  }
?>

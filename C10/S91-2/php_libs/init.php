<?php
  /*************************************************
   * 초기설정 파일
   */
  //----------------------------------------------------
  // 디버그 표시 true / 디버그 표시 안함 false
  //----------------------------------------------------
  // define("_DEBUG_MODE", true);
  define("_DEBUG_MODE",true);
  //----------------------------------------------------
  // 오류 표시
  //----------------------------------------------------
  // php.ini나htaccess에서 설정하지 않은 경우에는 여기에서 설정
  // ini_set( "display_errors", "On");
  // HTML_QuickForm에서 Strict 오류가 발생하기 때문에 아래의 설정을 사용하고 있습니다.
  ini_set("error_reporting",E_ALL & ~E_STRICT & ~E_DEPRECATED);
  //----------------------------------------------------
  // 데이터베이스 관련
  //----------------------------------------------------
  // 데이터베이스 접속 사용자명
  define("_DB_USER","sample");
  // 데이터베이스 접속 패스워드
  define("_DB_PASS","password");
  // 데이터베이스 호스트명
  define("_DB_HOST","localhost");
  // 데이터베이스명
  define("_DB_NAME","sampledb");
  // 데이터베이스 종류
  define("_DB_TYPE","mysql");
  // 데이터소스 홈
  define("_DSN",_DB_TYPE.":host="._DB_HOST.";dbname="._DB_NAME.";charset=utf8");
  //----------------------------------------------------
  // 세션명
  //----------------------------------------------------
  // 회원용 세션명
  define("_MEMBER_SESSNAME","PHPSESSION_MEMBER");
  // 관리자용 세션명
  define("_SYSTEM_SESSNAME","PHPSESSION_SYSTEM");
  // 회원용 인증정보 보관 변수명
  define("_MEMBER_AUTHINFO","userinfo");
  // 관리자용 인증정보 보관 변수명
  define("_SYSTEM_AUTHINFO","systeminfo");
  //----------------------------------------------------
  // 회원/관리자 처리분기용
  //----------------------------------------------------
  // 회원용 플래그
  define("_MEMBER_FLG",false);
  // 관리자 플래그
  define("_SYSTEM_FLG",true);
  //----------------------------------------------------
  // 파일 설치 디렉토리
  //----------------------------------------------------
  // 관련 파일을 설치하는 디렉토리
  define("_PHP_LIBS_DIR",_ROOT_DIR."../php_libs/");
  // 클래스 파일
  define("_CLASS_DIR",_PHP_LIBS_DIR."class/");
  // 환경변수
  define("_SCRIPT_NAME",$_SERVER['SCRIPT_NAME']);
  //----------------------------------------------------
  // Smarty 관련 설정
  //----------------------------------------------------
  // Smarty의 libs디렉토리
  define("_SMARTY_LIBS_DIR",_PHP_LIBS_DIR."smarty/libs/");
  // Smarty의 템플릿을 보관하는 디렉토리
  define("_SMARTY_TEMPLATES_DIR",_PHP_LIBS_DIR."smarty/templates/");
  // Smarty의 libs디렉토리 웹 서버가 사용할 수 있게 합니다
  define("_SMARTY_TEMPLATES_C_DIR",_PHP_LIBS_DIR."smarty/templates_c/");
  // Smarty의 libs디렉토리
  define("_SMARTY_CONFIG_DIR",_PHP_LIBS_DIR."smarty/configs/");
  // Smarty의libs디렉토리 웹 서버가 사용할 수 있게 합니다.
  define("_SMARTY_CACHE_DIR",_PHP_LIBS_DIR."smarty/cache/");
  //----------------------------------------------------
  // 필요한 파일을 읽어 들이기
  //----------------------------------------------------
  require_once("HTML/QuickForm.php");
  require_once("HTML/QuickForm/Renderer/ArraySmarty.php");
  require_once(_SMARTY_LIBS_DIR."Smarty.class.php");
  //----------------------------------------------------
  // 클래스 파일을 읽어 들이기
  //----------------------------------------------------
  function autoloader($className){
    require_once _CLASS_DIR.$className.".php";
  }

  spl_autoload_register("autoloader");
?>
<?php
  /*************************************************
   * 초기설정 파일
   */
  //----------------------------------------------------
  // 파일 설치 디렉토리
  //----------------------------------------------------
  // 관련 파일을 설치하는 디렉토리
  define("_PHP_LIBS_DIR",_ROOT_DIR."php_libs2/");
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
  require_once(_SMARTY_LIBS_DIR."Smarty.class.php");
?>
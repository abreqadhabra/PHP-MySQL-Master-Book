<?php
  class PrememberController extends BaseController{

    public function run(){
      if(isset($_GET['username']) && isset($_GET['link_pass'])){
        // 필요한 파라미터가 있음
        // 데이터베이스를 조작합니다.
        $PrememberModel = new PrememberModel();
        $userdata = $PrememberModel->check_premember($_GET['username'],$_GET['link_pass']);
        if(!empty($userdata) && count($userdata) >= 1){
          // 파라미터가 일치한다.
          // 가등록 테이블에서 삭제하고 member로 데이터를 입력한다.
          $PrememberModel->delete_premember_and_regist_member($userdata);
          $this->title = '등록완료화면';
          $this->message = '등록을 완료하였습니다. 탑 페이지에서 로그인하세요.';
        }else{
          // 파라미터가 일치하지 앟음
          $this->title = '오류 화면';
          $this->message = '이 URL은 무효입니다.';
        }
      }else{
        // 필요한 파라미터가 없음
        $this->title = '오류 화면';
        $this->message = '이 URL은 무효입니다.';
      }
      $this->file = 'premember.tpl';
      $this->view_display();
    }
  }
?>
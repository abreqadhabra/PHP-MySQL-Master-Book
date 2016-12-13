<?php
  class NoticeController extends BaseController{

    public function screen_modify(){
      // 데이터베이스를 조작합니다.
      $NoticeModel = new NoticeModel;
      $noticedata = $NoticeModel->get_notice_data_id('1');
      // 현재의 공지를 설정합니다.
      $this->form->setDefaults(['subject' => $noticedata['subject'],'body' => $noticedata['body']]);
      if($this->action == "form"){
        $this->form->addElement('text','subject','건명',['size' => 100]);
        $this->form->addElement('textarea','body','내용',['rows' => 5,'cols' => 40]);
        $this->next_type = 'notice';
        $this->next_action = 'complete';
        $this->form->addElement('submit','submit','수정하기');
        $this->file = "notice_form.tpl";
      }else{
        if($this->action == "complete"){
          $userdata = $this->form->getSubmitValues();
          $userdata['id'] = '1';
          $NoticeModel->modify_notice($userdata);
          $this->message = "공지를 수정하였습니다.";
          $this->file = "message.tpl";
        }
      }
      $this->title = '공지화면';
      $this->view_display();
    }
  }
?>
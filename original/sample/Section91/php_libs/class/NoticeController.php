<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NoticeController
 *
 * @author nagatayorinobu
 */
class NoticeController extends BaseController {

 
    //----------------------------------------------------
    // お知らせの修正
    //----------------------------------------------------
    public function screen_modify(){
        // データベースを操作します。
        $NoticeModel = new NoticeModel;
        $noticedata = $NoticeModel->get_notice_data_id('1');
        
        // 現在のお知らせを設定します。
        $this->form->setDefaults(
            [
                'subject'  => $noticedata['subject'],
                'body'     => $noticedata['body']
            ]
        );

        if($this->action == "form"){
            $this->form->addElement('text',    'subject','件名', ['size' => 100]);
            $this->form->addElement('textarea','body',   '内容', ['rows'=> 5, 'cols'=> 40]);
            $this->next_type    = 'notice';
            $this->next_action  = 'complete';
            $this->form->addElement('submit','submit', '更新する');
            $this->file = "notice_form.tpl";
        }else if($this->action == "complete"){
            $userdata = $this->form->getSubmitValues();
            $userdata['id'] = '1';
            $NoticeModel->modify_notice($userdata);
            $this->message = "お知らせを更新しました。";
            $this->file = "message.tpl";
        }
        $this->title  = 'お知らせ画面';
        $this->view_display();
    }    
    
    
    
    
    
}
?>

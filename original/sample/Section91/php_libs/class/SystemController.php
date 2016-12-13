<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SystemController
 *
 * @author nagatayorinobu
 */
class SystemController extends BaseController {
    //----------------------------------------------------
    // 管理者用メニュー
    //----------------------------------------------------
    public function run() {
        // セッション開始　認証に利用します。
        $this->auth = new Auth();
        $this->auth->set_authname(_SYSTEM_AUTHINFO);
        $this->auth->set_sessname(_SYSTEM_SESSNAME);
        $this->auth->start();

        if (!$this->auth->check() && $this->type != 'authenticate'){
            // 未認証
            $this->type = 'login';
        }
        
        // 共用のテンプレートなどをこのフラグで管理用に切り替えます。
        $this->is_system = true;

        // 会員側の画面を表示するためMemberControllerを利用します。
        $MemberController = new MemberController($this->is_system);
        
        switch ($this->type) {
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
            case "notice":
                $NoticeController = new NoticeController();
                $NoticeController->screen_modify();
                break;
            case "authenticate":
                $this->do_authenticate();
                break;
            default:
                $this->screen_top();
        }
    }

    //----------------------------------------------------
    // ログイン画面表示
    //----------------------------------------------------
    private function screen_login(){
        $this->form->addElement('text', 'username', 'ユーザー名', ['size' => 15, 'maxlength' => 50]);
        $this->form->addElement('password', 'password', 'パスワード', ['size' => 15, 'maxlength' => 50]);
        $this->form->addElement('submit','submit','ログイン');
        $this->next_type = 'authenticate';
        $this->title = 'ログイン画面';
        $this->file = "system_login.tpl";
        $this->view_display();
    }
    
    public function do_authenticate(){
        // データベースを操作します。
        $SystemModel = new SystemModel();
        $userdata = $SystemModel->get_authinfo($_POST['username']);
        if(!empty($userdata['password']) && $this->auth->check_password($_POST['password'], $userdata['password'])){
            $this->auth->auth_ok($userdata);
            $this->screen_top();
        } else {
            $this->auth_error_mess = $this->auth->auth_no();
            $this->screen_login();
        }
    }    

    //----------------------------------------------------
    // トップ画面
    //----------------------------------------------------
    private function screen_top(){
        unset($_SESSION['search_key']);
        unset($_SESSION[_MEMBER_AUTHINFO]);
        unset($_SESSION['pageID']);
        $this->title = '管理 - トップ画面';
        $this->file = 'system_top.tpl';
        $this->view_display();
    }    
    
    //----------------------------------------------------
    // 会員一覧画面
    //----------------------------------------------------
    private function screen_list(){
        $disp_search_key = "";
        $sql_search_key = "";
        // セッション変数の処理
        unset($_SESSION[_MEMBER_AUTHINFO]);
        if(isset($_POST['search_key']) && $_POST['search_key'] != ""){
            unset($_SESSION['pageID']);
            $_SESSION['search_key'] = $_POST['search_key']; 
            $disp_search_key = htmlspecialchars($_POST['search_key'], ENT_QUOTES); 
            $sql_search_key = $_POST['search_key']; 
        }else{
            if(isset($_POST['submit']) && $_POST['submit'] == "検索する"){
                unset($_SESSION['search_key']); 
            }else{
                if(isset($_SESSION['search_key'])){
                    $disp_search_key = htmlspecialchars($_SESSION['search_key'], ENT_QUOTES); 
                    $sql_search_key = $_SESSION['search_key']; 
                }
            }
        }
        // データベースを操作します。
        $MemberModel = new MemberModel();
        list($data, $count) = $MemberModel->get_member_list($sql_search_key);
        list($data, $links) = $this->make_page_link($data);

        $this->view->assign('count', $count);
        $this->view->assign('data', $data);
        $this->view->assign('search_key', $disp_search_key);
        $this->view->assign('links', $links['all']);
        $this->title = '管理 - 会員一覧画面';
        $this->file = 'system_list.tpl';
        $this->view_display();
    }    
}

?>

<?php
class Member {
    private $id;
    private $lastname;
    private $firstname;
    private $email;
    private $password;

    public function __construct($id, $lastname, $firstname, $email, $password) {
        $this->setId($id);
        $this->setLastname($lastname);
        $this->setFirstname($firstname);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }
    
    public function getLastname() {
        return $this->lastname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }
    
    public function getFirstname() {
        return $this->firstname;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getPassword() {
        return $this->password;
    }
    // 会員情報の登録
    public function regist(){
 
    }
 
    // 登録完了メールの送信
    public function registMail(){

    }

    // 会員情報の編集
    public function edit(){
 
    }

    // パスワードの再発行
    public function resendPassword(){
 
    }

    // 退会処理
    public function delete(){
 
    }

}
?>

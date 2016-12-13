<?php
  class Member{
    private $id;
    private $lastname;
    private $firstname;
    private $email;
    private $password;
    public function getId(){
      return $this->id;
    }
    public function setId($id){
      $this->id = $id;
    }
    public function getLastname(){
      return $this->lastname;
    }
    public function setLastname($lastname){
      $this->lastname = $lastname;
    }
    public function getFirstname(){
      return $this->firstname;
    }
    public function setFirstname($firstname){
      $this->firstname = $firstname;
    }
    public function getEmail(){
      return $this->email;
    }
    public function setEmail($email){
      $this->email = $email;
    }
    public function getPassword(){
      return $this->password;
    }
    public function setPassword($password){
      $this->password = $password;
    }
    // 회원정보 입력
    public function regist(){
    }
    // 입력완료 메일 발송
    public function registMail(){
    }
    // 회원정보 편집
    public function edit(){
    }
    // 패스워드 재발급
    public function resendPassword(){
    }
    // 탈퇴 처리
    public function delete(){
    }
  }
?>

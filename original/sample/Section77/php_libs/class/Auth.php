<?php
/**
 * Description of Auth
 *
 * @author nagatayorinobu
 */
class Auth {
    // セッションに関する処理
    private $authname; // 認証情報の格納先名
    private $sessname; // セッション名
    public function __construct() {

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
        // セッションが既に開始している場合は何もしない。
        if(session_status() ===  PHP_SESSION_ACTIVE){
            return;
        }
        if($this->sessname != ""){
            session_name($this->sessname);
        }
        // セッション開始
        session_start();
    }
    
    // 認証情報の確認
    public function check(){
        if(!empty($_SESSION[$this->get_authname()]) && $_SESSION[$this->get_authname()]['id'] >= 1){
            return true;
        }
    }

    public function get_hashed_password($password) {
        // コストパラメーター
        // 04 から 31 までの範囲 大きくなれば堅牢になりますが、システムに負荷がかかります。
        $cost = 10;

        // ランダムな文字列を生成します。
        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

        // ソルトを生成します。
        $salt = sprintf("$2y$%02d$", $cost) . $salt;

        $hash = crypt($password, $salt);
        
        return $hash;
    }
    
    
    // パスワードが一致したらtrueを返します
    public function check_password($password, $hashed_password){
        if ( crypt($password, $hashed_password) == $hashed_password ) {
            return true;
        }
    }
    
    // 認証情報の取得
    public function auth_ok($userdata){
        session_regenerate_id(true);
        $_SESSION[$this->get_authname()] = $userdata;
    }

    public function auth_no(){
        return 'ユーザ名かパスワードが間違っています。'."\n";
    }
    

    // 認証情報を破棄
    public function logout(){
        // セッション変数を空にする
		$_SESSION = [];

        // クッキーを削除
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // セッションを破壊
        session_destroy();
    }

// 


}

?>

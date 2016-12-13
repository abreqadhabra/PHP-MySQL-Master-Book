<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SystemModel
 *
 * @author nagatayorinobu
 */
class SystemModel extends BaseModel {
    //----------------------------------------------------
    // 管理者情報をユーザー名で検索
    //----------------------------------------------------
    public function get_authinfo($username){
        $data = [];
        try {
            $sql= "SELECT * FROM system WHERE username = :username limit 1";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindValue(':username',  $username,  PDO::PARAM_STR );
            $stmh->execute();
            $data = $stmh->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
        }
        return $data;
    }
}

?>

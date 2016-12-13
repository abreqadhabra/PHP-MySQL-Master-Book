<?php
/**
 * Description of MemberModel
 *
 * @author nagatayorinobu
 */
class MemberModel extends BaseModel {
    //----------------------------------------------------
    // 会員登録処理
    //----------------------------------------------------
    public function regist_member($userdata){
        try {
            $this->pdo->beginTransaction();
            $sql = "INSERT  INTO member (username, password, last_name, first_name, birthday, ken, reg_date )
            VALUES ( :username, :password, :last_name, :first_name, :birthday, :ken , now() )";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindValue(':username',   $userdata['username'],   PDO::PARAM_STR );
            $stmh->bindValue(':password',   $userdata['password'],   PDO::PARAM_STR );
            $stmh->bindValue(':last_name',  $userdata['last_name'],  PDO::PARAM_STR );
            $stmh->bindValue(':first_name', $userdata['first_name'], PDO::PARAM_STR );
            $stmh->bindValue(':birthday',   $userdata['birthday'],   PDO::PARAM_STR );
            $stmh->bindValue(':ken',        $userdata['ken'],        PDO::PARAM_INT );
            $stmh->execute();
            $this->pdo->commit();
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            print "エラー：" . $Exception->getMessage();
        }
    }


    //----------------------------------------------------
    // 会員のユーザ名（メールアドレス）と同じものがないか調べる。
    //----------------------------------------------------
    public function check_username($userdata){
        try {
            $sql= "SELECT * FROM member WHERE username = :username ";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindValue(':username',  $userdata['username'], PDO::PARAM_STR );
            $stmh->execute();
            $count = $stmh->rowCount();
        } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
        }
        if($count >= 1){
            return true;
        }else{
            return false;
        }
    }

    //----------------------------------------------------
    // 会員情報をユーザー名（メールアドレス）で検索
    //----------------------------------------------------
    public function get_authinfo($username){
        $data = [];
        try {
            $sql= "SELECT * FROM member WHERE username = :username limit 1";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindValue(':username',  $username,  PDO::PARAM_STR );
            $stmh->execute();
            $data = $stmh->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
        }
        return $data;
    }



    //----------------------------------------------------
    // 会員情報をユーザーIDで検索
    //----------------------------------------------------
    public function get_member_data_id($id){
        $data = [];
        try {
            $sql= "SELECT * FROM member WHERE id = :id limit 1";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindValue(':id', $id, PDO::PARAM_INT );
            $stmh->execute();
            $data = $stmh->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
        }
        return $data;
    }


    //----------------------------------------------------
    // 会員情報の更新処理
    //----------------------------------------------------
    public function modify_member($userdata){
        try {
            $this->pdo->beginTransaction();
            $sql = "UPDATE  member
                      SET 
                        username   = :username,
                        password   = :password,
                        last_name  = :last_name,
                        first_name = :first_name,
                        birthday   = :birthday,
                        ken        = :ken
                      WHERE id = :id";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindValue(':username',   $userdata['username'],   PDO::PARAM_STR );
            $stmh->bindValue(':password',   $userdata['password'],   PDO::PARAM_STR );
            $stmh->bindValue(':last_name',  $userdata['last_name'],  PDO::PARAM_STR );
            $stmh->bindValue(':first_name', $userdata['first_name'], PDO::PARAM_STR );
            $stmh->bindValue(':birthday',   $userdata['birthday'],   PDO::PARAM_STR );
            $stmh->bindValue(':ken',        $userdata['ken'],        PDO::PARAM_INT );
            $stmh->bindValue(':id',         $userdata['id'],         PDO::PARAM_INT );
            $stmh->execute();
            $this->pdo->commit();
            //print "データを" . $stmh->rowCount() . "件、更新しました。<br>";
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            print "エラー：" . $Exception->getMessage();
        }
    }


    //----------------------------------------------------
    // 会員情報を完全に削除する
    //----------------------------------------------------
    public function delete_member($id){
        try {
            $this->pdo->beginTransaction();
            $sql = "DELETE FROM member WHERE id = :id";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindValue(':id', $id, PDO::PARAM_INT );
            $stmh->execute();
            $this->pdo->commit();
            //print "データを" . $stmh->rowCount() . "件、削除しました。<br>";
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            print "エラー：" . $Exception->getMessage();
        }
    }

    //----------------------------------------------------
    // 会員一覧取得処理
    //----------------------------------------------------
    public function get_member_list($search_key){
        $sql = <<<EOS
SELECT
        m.id as id,
        m.username    as username,
        m.password    as password,
        m.last_name   as last_name,
        m.first_name  as first_name,
        m.birthday    as birthday,
        k.ken         as ken,
        m.reg_date    as reg_date
FROM
        member m,
        ken k
WHERE
        m.ken = k.id

EOS;
        if($search_key != ""){
            $sql .= " AND ( m.last_name  like :last_name OR m.first_name like :first_name ) ";
        }

        try {
            $stmh = $this->pdo->prepare($sql);
            if($search_key != ""){
                $search_key = '%' . $search_key . '%'; 
                $stmh->bindValue(':last_name',  $search_key, PDO::PARAM_STR );
                $stmh->bindValue(':first_name', $search_key, PDO::PARAM_STR );
            }
            $stmh->execute();
            // 検索件数を取得
            $count = $stmh->rowCount();
            // 検索結果を多次元配列で受け取る
            $i=0;
            $data = [];
            while ($row = $stmh->fetch(PDO::FETCH_ASSOC)){
                foreach( $row as $key => $value){
                        $data[$i][$key] = $value;
                }
                $i++;
            }
        } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
        }
        return [$data, $count];
    }

    
    
}

?>

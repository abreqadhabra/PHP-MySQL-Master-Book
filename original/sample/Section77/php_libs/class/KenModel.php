<?php

/**
 * Description of KenModel
 *
 * @author nagatayorinobu
 */
class KenModel extends BaseModel {
    //----------------------------------------------------
    // 県名の取得
    //----------------------------------------------------
    public function get_ken_data(){
        $key_array = [];
        try {
            $sql= "SELECT * FROM ken  ";
            $stmh = $this->pdo->query($sql);
            while ($row = $stmh->fetch(PDO::FETCH_ASSOC)){
                $key_array[$row['id']] = $row['ken']; 
            }
        } catch (PDOException $Exception) {
            print "エラー：" . $Exception->getMessage();
        }
        return $key_array;
    }
}

?>

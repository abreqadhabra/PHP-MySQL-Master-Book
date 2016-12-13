<?php
  class PrefectureModel extends BaseModel{

    public function get_prefecture_data(){
      $key_array = [];
      try{
        $sql = "SELECT * FROM prefecture ";
        $stmh = $this->pdo->query($sql);
        while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
          $key_array[$row['id']] = $row['prefecture'];
        }
      }catch(PDOException $Exception){
        print "오류:".$Exception->getMessage();
      }
      return $key_array;
    }
  }
?>
<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  $file_dir = 'C:\xampp\htdocs\C04\S45\images\\';// Windows
  //$file_dir  = '/Applications/XAMPP/xamppfiles/htdocs2/C04/S45/images/'; // Mac
  //$file_dir  = '/opt/lampp/htdocs2/C04/S45/images/';// Linux
  $file_path = $file_dir.$_FILES["uploadfile"]["name"];
  if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$file_path)){
    $img_dir = "images/";
    $img_path = $img_dir.$_FILES["uploadfile"]["name"];
    $size = getimagesize($file_path);
    ?>
    파일 업로드를 완료하였습니다.<BR>
    <IMG src="<?=$img_path?>" <?=$size[3]?>><BR>
    <B><?=$_POST["comment"]?></B><BR>
    <?php
  }else{
    ?>
    정상적으로 업로드되지 않았습니다.<BR>
    <?php
  }
?>
</BODY>
</HTML>
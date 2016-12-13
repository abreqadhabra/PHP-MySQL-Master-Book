<HTML>
<HEAD>
  <TITLE>PHP 테스트</TITLE>
</HEAD>
<BODY>
<?php
  $resizeX = 150;
  $thumbnail_name = "tumbnail.jpg";
  $file_dir = 'C:\xampp\htdocs\C04\S46\images\\';// Windows
  //$file_dir  = '/Applications/XAMPP/xamppfiles/htdocs2/C04/S46/images/'; // Mac
  //$file_dir  = '/opt/lampp/htdocs2/C04/S46/images/';// Linux
  $file_path = $file_dir.$_FILES["uploadfile"]["name"];
  $thumbnail_file_path = $file_dir.$thumbnail_name;
  if(move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$file_path)){
    $img_dir = "images/";
    $img_path = $img_dir.$_FILES["uploadfile"]["name"];
    $thumbnail_img_path = $img_dir.$thumbnail_name;
    if(mb_strpos($_FILES['uploadfile']['type'],'jpeg')){
      $gdimg_in = imagecreatefromjpeg($file_path);
      $ix = imagesx($gdimg_in);
      $iy = imagesy($gdimg_in);
      $ox = $resizeX;
      $oy = ($ox * $iy) / $ix;
      $gdimg_out = imagecreatetruecolor($ox,$oy);
      imagecopyresized($gdimg_out,$gdimg_in,0,0,0,0,$ox,$oy,$ix,$iy);
      imagejpeg($gdimg_out,$thumbnail_file_path);
      imagedestroy($gdimg_in);
      imagedestroy($gdimg_out);
      $size = getimagesize($file_path);
      $size2 = getimagesize($thumbnail_file_path);
      ?>
      파일 올리기를 완료하였습니다.<BR>
      <IMG src="<?=$img_path?>" <?=$size[3]?>>
      <IMG src="<?=$thumbnail_img_path?>" <?=$size2[3]?>>
      <BR>
      <B><?=$_POST["comment"]?></B><BR>
      <?php
    }else{
      print "JPEG 형식의 이미지만 업로드하여 주세요.<BR>";
    }
  }else{
    print "정상적으로 업로드되지 않았습니다.<BR>";
  }
?>
</BODY>
</HTML>
<HTML>
<HEAD>
<TITLE>PHPのテスト</TITLE>
</HEAD>
<BODY>
<?php
$file_dir  = 'C:\xampp\htdocs\image\\';// Windows
//$file_dir  = '/Applications/XAMPP/xamppfiles/htdocs2/image/'; // Mac
//$file_dir  = '/opt/lampp/htdocs2/image/';// Linux

$file_path = $file_dir . $_FILES["uploadfile"]["name"];

if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $file_path)) {

$img_dir   = "/image/";
$img_path  = $img_dir. $_FILES["uploadfile"]["name"];
$size      = getimagesize($file_path);
?>
ファイルアップロードを完了しました。<BR>
<IMG src="<?=$img_path?>" <?=$size[3]?>><BR>
<B><?=$_POST["comment"]?></B><BR>
<?php
} else {
?>
正常にアップロード処理されませんでした。<BR>
<?php
}
?>
</BODY>
</HTML>
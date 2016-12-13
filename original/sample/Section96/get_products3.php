<?php

// 取得したアクセスキーを設定してください。このままでは動作しません。
// アクセスキーID
define('ACCESSKEY_ID', 'あなたのアクセスキーID');
// シークレットアクセスキー
define('SECRETACCESSKEY', 'あなたのシークレットアクセスキー');
// トラッキングID
define('TRACKKING_ID', 'あなたのトラッキングID');

require_once 'Services/Amazon.php';
$amazon = new Services_Amazon(ACCESSKEY_ID, SECRETACCESSKEY, TRACKKING_ID);
$amazon->setLocale('JP');

$category = 'Books';
$options['Keywords'] = 'マイナビ';
$options['ResponseGroup'] = 'Images,ItemAttributes';
$result = $amazon->ItemSearch($category, $options);

foreach($result['Item'] as $item) {
    $title = htmlspecialchars($item['ItemAttributes']['Title'], ENT_QUOTES);
    $url   = $item['DetailPageURL'];
    $image = $item['MediumImage']['URL'];
    print '<P><A href="'. $url .'" ><IMG src="'.$image.'" border="0" align="left" >' . $title . '</A><br clear="all"></P>';
}

?>
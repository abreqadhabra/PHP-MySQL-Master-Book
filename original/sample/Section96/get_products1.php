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
$amazon->ItemSearch('Books', ['Keywords' => '本']);
$xml = $amazon->getRawResult();

print $xml;

?>
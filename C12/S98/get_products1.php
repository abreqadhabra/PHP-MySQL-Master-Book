<?php
  // 취득한 액세스 키를 설정하세요. 이대로는 동작하지 않습니다.
  // 액세스 키 ID
  define('ACCESSKEY_ID','여러분의 엑세스 키 ID');
  // 시크릿 액세스 키
  define('SECRETACCESSKEY','여러분의 시크릿 액세스 키');
  // 트랙킹 ID
  define('TRACKKING_ID','여러분의 트랙킹 ID');
  require_once 'Services/Amazon.php';
  $amazon = new Services_Amazon(ACCESSKEY_ID,SECRETACCESSKEY,TRACKKING_ID);
  $amazon->setLocale('JP');
  $amazon->ItemSearch('Books',['Keywords' => '책']);
  $xml = $amazon->getRawResult();
  print $xml;
?>
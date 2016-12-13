<?php
  // 취득한 액세스 키를 설정하세요. 이대로는 동작하지 않습니다.
  // 액세스 키 ID
  define('ACCESSKEY_ID','여러분의 액세스 키 ID');
  // 시크릿 액세스 키
  define('SECRETACCESSKEY','여러분의 시크릿 액세스 키);
// 트랙킹 ID
define('TRACKKING_ID', '여러분의 트랙킹 ID');

require_once 'Services / Amazon.php';
$amazon = new Services_Amazon(ACCESSKEY_ID, SECRETACCESSKEY, TRACKKING_ID);
$amazon->setLocale('JP');

$category = 'Books';
$options['Keywords'] = '마이나비';
$options['ResponseGroup'] = 'Images,ItemAttributes';
$result = $amazon->ItemSearch($category, $options);

foreach($result['Item'] as $item) {
    $title = htmlspecialchars($item['ItemAttributes']['Title'], ENT_QUOTES);
    $url   = $item['DetailPageURL'];
    $image = $item['MediumImage']['URL'];
    print ' < P><A href = "'. $url .'" ><IMG src = "'.$image.'" border = "0" align = "left" > ' . $title . '</A ><br clear = "all" ></P > ';
}

?>
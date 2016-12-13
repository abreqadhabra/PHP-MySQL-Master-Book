<?php
$member = array( "name" => "○田○夫",
		 "tel"  => "03-0000-0000",
		 "age"  => 20,
                 "tall" => 170);

foreach($member as $key => $value )
{
	
	if($key == "name")
	{ 
		$title = "名前";
	}else if($key == "age"){
		$title = "年齢";
	}else if($key == "tall"){
		$title = "身長";
	}else{
	        print "処理を飛ばします。<BR>";
		continue;
	}
	print "$title : $value";
	print "<BR>";
}
?>
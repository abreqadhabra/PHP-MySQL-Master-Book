<?php

print get_greeting();

function get_greeting(){
    $greeting = "";
    $hour = date("H");
    if($hour >= 0 && $hour < 10 ) {
        $greeting = 'おはようございます。';
    } else if ($hour >= 10 && $hour < 18) {
        $greeting = 'こんにちは。';
    } else {
        $greeting = 'こんばんは。';
    }
    return $greeting;
}
?>

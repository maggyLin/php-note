<?php

$data = array(
    "account" => "bbb",
    "name" => "bbb"
);

$ch = httpRequest('https://www.jinyuelipin.com/sandapi/test2.php', json_encode($data));

print_r($ch);
// print_r($ch['account']);

function httpRequest($api, $data_string) {

    $ch = curl_init($api);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization:Bearer sD8DqA8EWr5qUKzdXyIcGzGWjTVWMrWxq1xDcTbleWwtzm9fEKT085dK9Pu5',   //header token
        'Content-Type:application/json',    //指定為json
        'Cache-Control:no-cache',
        'Content-Length: ' . strlen($data_string)
        )
    );
    $result = curl_exec($ch);
    curl_close($ch);
  
    return json_decode($result, true);
}


//----------------------------------------------------------------------

// test2.php 獲取 post json 資料

// $c = file_get_contents('php://input'); 
// print_r($c);

?>
<?php 
$url = 'https://www.myspay.com/test/test.php';
$opt_data = 'para=1&test=2';
$header = array( "Cache-Control: no-cache", "Pragma: no-cache", "Token: abcabcabc" ,'Content-Type: application/json');

$ch = curl_init();  //初始化
curl_setopt($ch,CURLOPT_URL,$url);  //設定url
// curl_setopt($ch,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);  //設定http驗證方法

//是否要比對驗證伺服器憑證  (false 取消 提升curl 速度)
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);


//設定header
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

//是否印出 回傳的header 訊息 (to include the header in the output.)
curl_setopt($ch,CURLOPT_HEADER,0);  

//post data
curl_setopt($ch,CURLOPT_POST,1);  //設定傳送方式為post請求
curl_setopt($ch,CURLOPT_POSTFIELDS,$opt_data);  //設定post的資料

//設定curl_exec獲取的資訊的返回方式 (取內容但不直接輸出)
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  

//成功连接 服务器前等待多久
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
//time out (秒)
curl_setopt($ch, CURLOPT_TIMEOUT, 5);

// curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');

//獲取 http code
// $code = curl_getinfo($ch, CURLINFO_HTTP_CODE) ;

// 執行獲取
$result = curl_exec($ch);


if($result === false){
    echo "false!!! <br>";

    echo curl_errno($ch);
    exit();
}

echo "OK!!! <br>";

print_r($result);

// 釋放資源
curl_close($ch);



//---------------------------------------------
//獲取 post 資料
// $c = var_dump($_POST);
// $act = $_POST['act'];

?>
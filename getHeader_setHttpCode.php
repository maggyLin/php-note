<?php

// $user_token = apache_request_headers();
$user_token = apache_request_headers()['Token']; //開頭小寫會自動轉大寫


if($user_token){
  http_response_code(201);
  $result=MyJson($user_token);
  die($result);
}
else{
  http_response_code(403);
  // $result=MyJson("token error");
  // die($result);
}





//修正 JSON 中文編碼問題  先urlencode再urldecode
function MyJson($code){
	$code = json_encode(urlencodeAry($code));
	return urldecode($code);
}

function urlencodeAry($data){
	if(is_array($data)){
		foreach($data as $key => $val){ $data[$key] = urlencodeAry($val); }
		return $data;
	}else	return urlencode($data);
}


?>
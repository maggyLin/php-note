<?php

get_txt_curl_fun123("https://cnqi.junyichushi.com/admin001/032118238/0321182381.gz");
echo "<br>";
get_txt_curl_fun123("https://cnqi.junyichushi.com/admin001/012517_471-1pon-1080p/012517_471-1pon-1080p1.txt");
echo "<br>";
get_txt_curl_fun123("https://cnqi.junyichushi.com/admin001/NACR147/NACR1471.gz");
echo "<br>";
get_txt_curl_fun123("https://cnqi.junyichushi.com//admin001/data1/d10_YMDD151/d10_YMDD1511.gz");
echo "<br>";
get_txt_curl_fun123("https://cnqi.junyichushi.com//admin001/heyzo_hd_0506_full/heyzo_hd_0506_full1.gz");
echo "<br>";
echo "<br>";
echo "<br>";

get_txt_curl_fun123("https://cdel9avf8l5a1fl.856538.com/sweet1/SUPA324/SUPA3241.gz");
echo "<br>";
get_txt_curl_fun123("https://cdel9avf8l5a1fl.856538.com/sweet1/data1/d6_010717345carib1080p/d6_010717345carib1080p1.gz");
echo "<br>";
get_txt_curl_fun123("https://cdel9avf8l5a1fl.856538.com/sweet1/100416_397-1pon-1080p/100416_397-1pon-1080p1.txt");
echo "<br>";
get_txt_curl_fun123("https://cdel9avf8l5a1fl.856538.com/sweet1/0512_2108/0512_21081.gz");
echo "<br>";
get_txt_curl_fun123("https://cdel9avf8l5a1fl.856538.com/sweet1/FC2PPV852949858502864231/FC2PPV8529498585028642311.gz");
echo "<br>";
echo "<br>";


//抓取txt
function get_txt_curl_fun123($url){
  $ch = curl_init();
  $timeout = 0;
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  //在需要用户检测的网页里需要增加下面两行
  //curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
  //curl_setopt($ch, CURLOPT_USERPWD, US_NAME.”:”.US_PWD);
  $contents = curl_exec($ch);
  $info = curl_getinfo($ch);

  echo 'Took :' . $info['total_time'];
  echo "<br>";
  echo 'download:' . $info['speed_download'];
  echo "<br>";
  echo 'namelookup:' . $info['namelookup_time'];
  echo "<br>";
  echo 'connect:' . $info['connect_time'];
  echo "<br>";

  curl_close($ch);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <script src="js/jquery-3.2.1.js"></script>
</head>
<body>


  
</body>
</html>


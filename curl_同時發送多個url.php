<?php




//使用 CURL 同步抓取多個網頁連線資訊
function async_get_url($url_array, $timeoutint)
{
    if (!is_array($url_array))
        return false;

    $data    = array();
    $handle  = array();
    $running = 0;

    $mh = curl_multi_init(); // multi curl handler

    $i = 0;
    foreach($url_array as $url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return don't print
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeoutint);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // 302 redirect
        curl_setopt($ch, CURLOPT_MAXREDIRS, 7);
        curl_multi_add_handle($mh, $ch); // 把 curl resource 放進 multi curl handler 裡
        $handle[$i++] = $ch;
    }

    do {
        curl_multi_exec($mh, $running);
        curl_multi_select($mh);
    } while ($running > 0);

    /* 自訂需要的讀取資料 */
    foreach($handle as $i => $ch) {
        //$content  = curl_multi_getcontent($ch);
        //$data[$i] = (curl_errno($ch) == 0) ? $content : false;
        $data[$i] =  curl_getinfo($ch);
    }

    /* 移除 handle*/
    foreach($handle as $ch) {
        curl_multi_remove_handle($mh, $ch);
    }

    curl_multi_close($mh);

    return $data;
}

?>
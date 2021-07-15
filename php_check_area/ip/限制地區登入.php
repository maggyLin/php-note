<?php 
include_once("lib/geoip.php");

 $gi = geoip_open("lib/GeoIP.dat",GEOIP_STANDARD);
      $city = geoip_country_name_by_addr($gi, getIP());
      
      // close the database
      geoip_close($gi);     
      
      if($city=='Taiwan' &&  substr($Username,0,3)=='bo_'){
      header("Location: http://game1.ht456.com/area_err.php?v=".$Username.",country=".$city); 
      //確保重定向後，後續代碼不會被執行 
      // exit;
      // return;
      }       
      



?>
<?php 
$curl = curl_init();
$query_str = "?rid=001.005.0761";
//https://www.chilis.com/order?rid=001.005.0761
//https://www.chilis.com/menu?rid=001.005.0761
//https://www.chilis.com/locations/us/california/fullerton?lat=33.8703645&lng=-117.9242123
$url = "https://www.chilis.com/menu";
curl_setopt($curl,CURLOPT_URL,'https://www.chilis.com/menu');

 curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
 curl_setopt($ch, CURLOPT_POST,           1 );
 curl_setopt($ch, CURLOPT_POSTFIELDS,     $query_str ); 

$result = curl_exec($curl);

echo $result;
?>

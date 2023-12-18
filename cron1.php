<?php

$ch = curl_init('https://tabikakemas.com.my/functions.php');
curl_setopt($ch, CURLOPT_POSTFIELDS,"stopmesyuarat=stopmesyuarat");

// execute!
curl_exec($ch);
// echo $response;

curl_close($ch);

?>
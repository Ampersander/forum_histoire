<?php

$url = "http://127.0.0.1/api/subforum";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/x-www-form-urlencoded",
   "Authorization: Bearer mt0dgHmLJMVQhvjpNXDyA83vA_PxH23Y",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "nameForum=Nourriture&=";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);

?>
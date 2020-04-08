<?php
  $ch = curl_init();
  $url = "http://httpbin.org/ip";
  curl_setopt($ch, CURLOPT_URL,
  "http://api.scraperapi.com/?api_key=c2f24e101e760beae023d690cd45cda4&url=".$url."&render=true");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, FALSE);

  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Accept: application/json"
  ));

  $response = curl_exec($ch);
  curl_close($ch);

  var_dump($response);
  ?>
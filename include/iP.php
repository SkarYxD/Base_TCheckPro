<?php
$IP = '';
  if (getenv('HTTP_CLIENT_IP')) {
    $IP =getenv('HTTP_CLIENT_IP');
  } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
    $IP =getenv('HTTP_X_FORWARDED_FOR');
  } elseif (getenv('HTTP_X_FORWARDED')) {
    $IP =getenv('HTTP_X_FORWARDED');
  } elseif (getenv('HTTP_VIA')) {
    $IP = getenv('HTTP_VIA');
  } elseif (getenv('HTTP_USERAGENT_VIA')) {
    $IP = getenv('HTTP_USERAGENT_VIA');
  } elseif (getenv('HTTP_X_CLUSTER_CLIENT_IP')) {
    $IP =getenv('HTTP_X_CLUSTER_CLIENT_IP');
  } elseif (getenv('HTTP_FORWARDED_FOR')) {
    $IP =getenv('HTTP_FORWARDED_FOR');
  } elseif (getenv('HTTP_FORWARDED')) {
    $IP = getenv('HTTP_FORWARDED');
  } elseif (getenv('HTTP_PROXY_CONNECTION')) {
    $IP = getenv('HTTP_PROXY_CONNECTION');
  } elseif (getenv('HTTP_XPROXY_CONNECTION')) {
    $IP = getenv('HTTP_XPROXY_CONNECTION');
  } elseif (getenv('HTTP_PC_REMOTE_ADDR')) {
    $IP = getenv('HTTP_PC_REMOTE_ADDR');
  } else {
    $IP = $_SERVER['REMOTE_ADDR'];
  }
  return $IP; 
?>
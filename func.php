<?php
 
class Curl 
{
	var $curl;
	var $url;
	var $proxyport;
	
	// Randomised line function for selecting the IP
	function pc_randomint($max = 1)
	{ 
		$m = 1000000;
      
		return ((mt_rand(1,$m * $max)-1)/$m);
	}
 
	// Function outputs a random proxy for curl
	function random_proxy()
	{
		$line_number = 0;
 
		$fh = fopen('proxy-list.txt','r') or die($php_errormsg);
		while (!feof($fh))
		{
			if ($s = fgets($fh,1048576))
			{
				$line_number++;
				if ($this->pc_randomint($line_number) < 1)
				{  
					$line = $s;
					
					$proxyarr = explode(":", $line);
					$address = trim($proxyarr[0]);
					$this->proxyport = trim($proxyarr[1]);
				}
			}  
		}
     
		fclose($fh) or die($php_errormsg);
      
	return $address;
	}
 
	function Curl($url) 
	{
		
		// Init curl
		$this->curl = curl_init();
		
		$this->url 	 = $url;
 
		$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
		$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
		$header[] = "Cache-Control: max-age=0";
		$header[] = "Connection: keep-alive";
		$header[] = "Keep-Alive: 300";
		$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
		$header[] = "Accept-Language: en-us,en;q=0.5";
		$header[] = "Pragma: "; // browsers keep this blank.
 
		curl_setopt($this->curl, CURLOPT_URL, $this->url);
		//curl_setopt($this->curl, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');
		curl_setopt($this->curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT,25);
		curl_setopt($this->curl, CURLOPT_REFERER, 'http://www.google.com');
		curl_setopt($this->curl, CURLOPT_ENCODING, 'gzip,deflate');
		//curl_setopt($this->curl, CURLOPT_AUTOREFERER, true);
		//curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->curl, CURLOPT_HTTPPROXYTUNNEL, 1);
		curl_setopt($this->curl, CURLOPT_TIMEOUT, 300);
		curl_setopt($this->curl, CURLOPT_COOKIEJAR, 'cookie.txt');
		curl_setopt($this->curl, CURLOPT_COOKIEFILE, 'cookie.txt');
	}
	
	
}
 
?>

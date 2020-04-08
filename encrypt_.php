<?php
	if(ISSET($_POST['encryptor'])){
		$encryptor  = $_POST['encryptor'];
		$password = $_POST['password'];
		
		switch($encryptor ){
			case "md5":
				echo hash("md5", $password);
				break;
			case "sha1":
				echo hash("sha1", $password);
				break;
			case "ripemd160":
				echo hash("ripemd160", $password);
				break;
			case "haval160,4":
				echo hash("haval160,4", $password);
				break;
			case "sha256":
				echo hash("sha256", $password);
				break;	
		}
	}
?>
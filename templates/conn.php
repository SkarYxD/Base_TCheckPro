<?php

class Cl_getScripts {

	/**
	* @var va a contener la conexión de base de datos
	*/
	protected $_con;
	
	/**
	 * Inializar DBclass
	*/
	public function __construct()
	{
		$db = new Cl_DBclass();
		$this->_con = $db->con;
	}

	/**
	* Registro de usuarios
	* @param array $data
	*/


	/* 
		AQUI SE VIENE LO CHIDO XDXDXDXD
	*/
	public function keyGet( array $data) {

		if( !empty( $data ) ){
			
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);


			// escapar de las variables para la seguridad
			$tcpKey = mysqli_real_escape_string( $this->_con, $trimmed_data['tcpKey'] );
			$admKey = mysqli_real_escape_string( $this->_con, $trimmed_data['admKey'] );
			$tipKey = mysqli_real_escape_string( $this->_con, $trimmed_data['tipKey'] );
			$iplKey = mysqli_real_escape_string( $this->_con,  $trimmed_data['iplKey'] );

			$query = "INSERT INTO key_tcp (id, tcpKey, creado, recKey, admKey, tipKey, iplKey) VALUES (NULL, '$tcpKey', CURRENT_TIMESTAMP, 1, '$admKey', '$tipKey', '$iplKey')";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};


	}
}




	   	$conn = new mysqli("localhost","9eIXamqCr0SglNnyQ7RoG95H52o4Kbp7","asd02322","uEhdxKYiQyVHJYgG1FixGQhgwK5pktL7");
	    $count = 0;
	    $sql2 = "SELECT * FROM anuncios WHERE estado = 0";
	    $result = mysqli_query($conn, $sql2);
	    $count = mysqli_num_rows($result);

	

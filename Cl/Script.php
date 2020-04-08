<?php
class Cl_Script
{

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
	public function keyinsert( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);
			
			// escapar de las variables para la seguridad
			$tcpKey = mysqli_real_escape_string( $this->_con, $trimmed_data['tcpKey'] );
			$recKey = mysqli_real_escape_string( $this->_con, $trimmed_data['recKey'] );
			$admKey = mysqli_real_escape_string( $this->_con,  $trimmed_data['admKey'] );
			$tipKey = mysqli_real_escape_string( $this->_con,  $trimmed_data['tipKey'] );
            $iplKey = mysqli_real_escape_string( $this->_con,  $trimmed_data['iplKey'] );

			if((!$tcpKey)) {
				throw new Exception( FIELDS_MISSING_KEY );
			}

			$query = "INSERT INTO tcp_key (id_key, tcpKey, creado, recKey, admKey, tipKey, iplKey) VALUES (NULL, '$tcpKey', CURRENT_TIMESTAMP, '$recKey', '$admKey', '$tipKey', '$iplKey')";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( KEY_CREATE_FAIL );
		}
	} 

	public function genAccountv1 ( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);
			
			// escapar de las variables para la seguridad;
			$creditos = mysqli_real_escape_string( $this->_con,  $trimmed_data['creditos'] );
			$key_tcp = mysqli_real_escape_string( $this->_con,  $trimmed_data['tcpKey'] );
			$tcpAss = mysqli_real_escape_string( $this->_con,  $trimmed_data['tcpAss'] );
			$expireAcc = mysqli_real_escape_string( $this->_con,  $trimmed_data['expireAcc'] );
			$rolAcc = mysqli_real_escape_string( $this->_con,  $trimmed_data['rolAcc'] );
			$nAdmin = mysqli_real_escape_string( $this->_con,  $trimmed_data['nAdmin'] );
			$myIP = mysqli_real_escape_string( $this->_con,  $trimmed_data['myIP']);
			if((!$key_tcp)) {
				throw new Exception( GENACC_FIELD_MISSING );
			}

			/*$genPass = $this->genPasswordv1(); */
			$datetime = "Y-m-d";
			$date = new DateTime($expireAcc);
			$newDate = $date->format($datetime);
			$genNombre = $this->genNombrev1(); //Llamamos a la funcion (genNombresv1) Linea: 119
			$genApellidos = $this->genApellidosv1(); //Llamamos a la funcion (genApellidosv1) linea: 127
			$genEmail = $this->genEmailv1(); //Llamamos a la funcion (genEmailv1) Linea: 112
			$genPass1 = md5( $tcpAss );
			$query = "INSERT INTO users (user_id, name, email, password, key_tcp, level, creditos, picture, genBy, descripcion, created, expireAcc, myIp) VALUES (NULL, '$genNombre', '$genEmail', '$genPass1', '$key_tcp', '$rolAcc', '$creditos', picture, '$nAdmin', picture,CURRENT_TIMESTAMP, '$expireAcc', '$myIP')";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);

				return true;
			};
		} else{
			throw new Exception( GENACC_CREATE_FAIL );
		}
	}

	public function editAccountv1 ( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);
			
			// escapar de las variables para la seguridad;
			$creditos = mysqli_real_escape_string( $this->_con,  $trimmed_data['creditos'] );
			$key_tcp = mysqli_real_escape_string( $this->_con,  $trimmed_data['tcpKey'] );
			$tcpAss = mysqli_real_escape_string( $this->_con,  $trimmed_data['tcpAss'] );
			$expireAcc = mysqli_real_escape_string( $this->_con,  $trimmed_data['expireAcc'] );
			$rolAcc = mysqli_real_escape_string( $this->_con,  $trimmed_data['rolAcc'] );
			if((!$key_tcp)) {
				throw new Exception( EDITACC_FIELD_MISSING );
			}

			/*$genPass = $this->genPasswordv1(); */
			$datetime = "Y-m-d";
			$date = new DateTime($expireAcc);
			$newDate = $date->format($datetime);
			$genNombre = $this->genNombrev1(); //Llamamos a la funcion (genNombresv1) Linea: 119
			$genApellidos = $this->genApellidosv1(); //Llamamos a la funcion (genApellidosv1) linea: 127
			$genEmail = $this->genEmailv1(); //Llamamos a la funcion (genEmailv1) Linea: 112
			$genPass1 = md5( $tcpAss );
			$query = "UPDATE users SET password = '$password' WHERE user_id = '$user_id'";
			$query = "UPDATE users SET  WHERE user id = '$user_id')";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				
				return true;
			};
		} else{
			throw new Exception( EDITACC_CREATE_FAIL );
		}
	}

	private function genPasswordv1() //Esta funcion no se usa ya que no se obtiene en texto plano la contraseña desde panel.php
	{
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$passGen = array(); //recuerde que debe declarar $pass como un array
		$alphaLength = strlen($alphabet) - 1; //poner la longitud -1 en cach茅
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$passGen[] = $alphabet[$n];
		}
		return implode($passGen); //convertir el array en una cadena
	}

	private function genEmailv1()
	{
		$gNombre = $this->genNombrev1();
		$gEmail = preg_replace('<\W+>', '', $gNombre).rand(0000,9999)."@jkdev.com";
		return $gEmail;
	}

	private function genNombrev1()
	{
		$gNombre = file("include/genNombres.txt");
	    $mNombre = rand(0, sizeof($gNombre)-1);
	    $gNombre = $gNombre[$mNombre];
	  return $gNombre;
	}

	private function genApellidosv1()
	{
		$gApellidos = file("include/genApellidos.txt");
		$mApellidos = rand(0, sizeof($gApellidos)-1);
		$gApellidos = $gApellidos[$mApellidos];
		return $gApellidos;
	}

}

/** SISTEMA CREADO POR JK DEV TODO LOS DERECHOS RESERVADOS 2019-2020 **/
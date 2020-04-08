<?php
class Cl_User
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

	public function registration( array $data )
	{
		if( !empty( $data ) ){
			
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);
			
			// escapar de las variables para la seguridad
			$name = mysqli_real_escape_string( $this->_con, $trimmed_data['name'] );
			$password = mysqli_real_escape_string( $this->_con, $trimmed_data['password'] );
			$cpassword = mysqli_real_escape_string( $this->_con, $trimmed_data['confirm_password'] );
			$key_tcp = mysqli_real_escape_string( $this->_con,  $trimmed_data['key_tcp'] );

			// Verifica la direccion de correo electrónico:
			if (filter_var( $trimmed_data['email'], FILTER_VALIDATE_EMAIL)) {
				$email = mysqli_real_escape_string( $this->_con, $trimmed_data['email']);
			} else {
				throw new Exception( "Por favor, introduce una dirección de correo electrónico válida!" );
			} 

			if((!$name) || (!$email) || (!$password) || (!$cpassword) || (!$key_tcp)) {
				throw new Exception( FIELDS_MISSING );
			}

			if ($password !== $cpassword) {
				throw new Exception( PASSWORD_NOT_MATCH );
			}   
			$password = md5( $password );
			$query = "INSERT INTO users (user_id, name, email, password, key_tcp, level, creditos, picture, descripcion, created, expireAcc, myIP) VALUES (NULL, '$name', '$email', '$password', '$key_tcp', 1, 0, picture, picture, CURRENT_DATE, 0000-00-00, 127.0.0.1)";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( USER_REGISTRATION_FAIL );
		}
	}
	/**
	 * Este metodo para iniciar sesión
	 * @param array $data
	 * @return retorna falso o verdadero
	 */
	public function login( array $data )
	{
		$_SESSION['logged_in'] = false;
		if( !empty( $data ) ){
			
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);
			
			// escapar de las variables para la seguridad
			$email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
			$password = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );
			$key_tcp = mysqli_real_escape_string( $this->_con,  $trimmed_data['key_tcp'] );
                        
			if((!$email) ||  (!$password) ||  (!$key_tcp)) {
				throw new Exception( LOGIN_FIELDS_MISSING );
			}
                        
			$password = md5( $password );
			$query = "SELECT user_id, name, email, key_tcp, creditos, level, descripcion, picture, created, expireAcc, myIP FROM users WHERE ( email = '$email' and key_tcp = '$key_tcp' ) AND password = '$password'";
                        $result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);
			mysqli_close($this->_con);
			if( $count == 1){
				$_SESSION = $data;
				$_SESSION['logged_in'] = true;
				unset($_SESSION['attempt']);
				return true;
			}else{
				throw new Exception( LOGIN_FAIL );
			}
		} else{
			
			if(!isset($_SESSION['attempt'])){
					$_SESSION['attempt'] = 0;
			}
			
			$_SESSION['attempt'] += 1;
			
			if($_SESSION['attempt'] === 3){
				$_SESSION['attempt_again'] = time() + (60*60);
				//note 5*60 = 5mins, 60*60 = 1hr, to set to 2hrs change it to 2*60*60
				$_SESSION['msg'] = "disabled";
				throw new Exception( LOGIN_ATTEMP_LIMIT );
				
			}
		}
	}
	
	/**
	 * El siguiente metodo para verificar los datos de la cuenta para el cambio de datos
	 * @param array $data
	 * @throws Exception
	 * @return boolean
	 */
	
	public function account( array $data )
	{
		if( !empty( $data ) ){
			// Trim todos los datos entrantes:
			$trimmed_data = array_map('trim', $data);
			
			// escapar de las variables para la seguridad
			$user_id = mysqli_real_escape_string( $this->_con, $trimmed_data['user_id'] );
			$email = mysqli_real_escape_string( $this->_con, $trimmed_data['email'] );
            $descripcion = mysqli_real_escape_string( $this->_con, $trimmed_data['descripcion'] );
			if((!$email) || (!$descripcion) ) {
				throw new Exception( FIELDS_MISSING );
			}
			$query = "UPDATE users SET email = '$email', descripcion = '$descripcion' WHERE user_id = '$user_id'";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
                
                if( !empty( $data ) ){
                    
                }
            
	}
	
	/**
	 * Este metodo para cerrar las sesión
	 */
	public function logout()
	{
		session_unset();
		session_destroy();
		header('Location: index.php');
	}
        
        	/**
	 * Este metodo para cerrar las sesión
	 */
	
	/**
	 * Esto restablece la contraseña actual y la nueva contraseña para enviar correo
	 * @param array $data
	 * @throws Exception
	 * @return boolean
	 */
	public function forgetPassword( array $data )
	{
		if( !empty( $data ) ){
			
			// escapar de las variables para la seguridad
			$email = mysqli_real_escape_string( $this->_con, trim( $data['email'] ) );
			
			if((!$email) ) {
				throw new Exception( FIELDS_MISSING );
			}
			$password = $this->randomPassword();
			$password1 = md5( $password );
			$query = "UPDATE users SET password = '$password1' WHERE email = '$email'";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				$to = $email;
				$subject = "Nueva solicitud de contraseña";
				$txt = "Su nueva contraseña ".$password;
				$headers = "From: support@unc3ns0r3d.com" . "\r\n" .
						"CC: support@unc3ns0r3d.com";
					
				mail($to,$subject,$txt,$headers);
				return true;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}
	
	/**
	 * Esto generará una contraseña aleatoria
	 * @return string
	 */
	
	private function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //recuerde que debe declarar $pass como un array
		$alphaLength = strlen($alphabet) - 1; //poner la longitud -1 en caché
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //convertir el array en una cadena
	}
}
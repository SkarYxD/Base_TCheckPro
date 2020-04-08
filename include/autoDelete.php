<?php 
ob_start();
session_start();
date_default_timezone_set("America/Argentina/Buenos_Aires");
require_once '../templates/funcion.php'; 
require_once '../config.php'; 
require_once '../include/iP.php';
if(!isset($_SESSION['logged_in'])){
	header('Location: index.php');
}
    elseif ($_SESSION['level'] != "5") {
        header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Limpieza · Cuentas Expiradas</title>
	<link rel="stylesheet" href="../vendor/fontawesome/css/all.css"/>

	<style type="text/css">
		html{
			box-sizing: border-box;
		}

		*,
		*:before,
		*:after{
			box-sizing: inherit;
		}
		body{
			background-color: #000000;
			height: 90vh;
		}

		.contenedor-web{
			display: -webkit-box;
			display: -ms-box;
			display: flex;

			-webkit-box-aling: center;
			-ms-box-aling: center;
			align-items: center;

			-ms-flex-pack: distribute;
			justify-content: space-around;
			height: 100%;
		}

		.texto_consola{
			color: green;
		}
		.texto_consolar{
			color: red;
		}


		.consola{
			max-width: 720px;
			min-width: 460px;
			width: 50vw;
			max-height: 540px;
			min-height: 320px;
			height: 50vh;
			border: 4px solid #bbb;
			font-family: monospace;
		}

		.consola-cabecera{
			height: 24px;
			background-color: #bbb;
			display: -webkit-box;
			display: ms-box;
			display; flex;

			-webkit-box-pack: justify;
			-ms-flex-pack: justify;
			justify-content: space-between;
			bottom: 4px solid #bbb;
		}

		.consola .consola-cabecera .console-titulo{
			font-weight: 600;
			color: #222;
		}

		.consola .consola-cabecera .consola-acciones{
			display: -webkit-box;
			display: -ms-box;
			display: flex;

			-ms-flex-pack: distribute;
			justify-content: space-around;
		}

		.consola .consola-cabecera .consola-acciones .consola-accion{
			margin-left: 5px;
			display: block;
			width: 20px;
			height: 20px;
			color: #222;
			text-align: center;
			font-size: 0.9em;
		}

		.consola .consola-cabecera .consola-acciones .consola-accion .fas{
			line-height: 20px;
		}

		.consola .consola-cabecera .consola-acciones .consola-accion.consola-accion-min{
			background-color: #eeee73;

		}

		.consola .consola-cabecera .consola-acciones .consola-accion.consola-accion-max{
			background-color: #bee07e;

		}

		.consola .consola-cabecera .consola-acciones .consola-accion.consola-accion-cerr{
			background-color: #e08d8d;

		}

		.consola .consola-cuerpo{
			height: calc(100% - 24px);
			background-color: #222;
		}

		.consola .consola-cuerpo .consola-texto{
			padding: 4px;
			color: #ddd;
		}

		.consola .consola-cuerpo .consola-texto .consola-input{
			animation: 1.5s blink infinite;
		}

		@keyframes blink{
			0%{
				opacity: 1;
			}
			50%{
				opacity: 1;
			}
			51%{
				opacity: 0;
			}
			100%{
				opacity: 0;
			}
		}
	</style>
</head>
<body>
<?php
	date_default_timezone_set("America/Argentina/Buenos_Aires"); /*Seteamos el Time Zone*/

	error_reporting(E_ALL); /*Mostramos los errores*/

	require_once 'conn_.php';
	$date = date('Y-m-d');
	$query = mysqli_query($conn, "SELECT * FROM users WHERE expireAcc <= CURRENT_DATE AND level <= 4 && level >= 2");
	$levelUpdate = "0";
	while($fetch = mysqli_fetch_array($query)){
		if($fetch['expireAcc'] !== $date){
			mysqli_query($conn, "UPDATE users SET level = '$levelUpdate' WHERE expireAcc <= CURRENT_DATE AND level <= 4 && level >= 2") or die(mysqli_error());
		}
	}
?>
	<div class="contenedor-web">
		<div class="consola">
			<div class="consola-cabecera">
				<div class="consola-titulo">Consola · Unc3ns0r3d</div>
				<div class="consola-acciones">
					<div class="consola-accion consola-accion-min"><i class="fas fa-caret-down"></i></div>
					<div class="consola-accion consola-accion-max"><i class="fas fa-arrows-alt"></i></div>
					<div class="consola-accion consola-accion-cerr"><i class="fas fa-times"></i></div>
				</div>
			</div>
			<div class="consola-cuerpo">
				<div class="consola-texto"><span class="texto_consola">Unc3ns0r3d@jkdev:</span> Iniciando limpieza de cuentas expiradas...</div>
				<div class="consola-texto"><span class="texto_consola">Unc3ns0r3d@jkdev:</span> Seteando cuentas a Free User...</div>
				<div class="consola-texto"><span class="texto_consola">Unc3ns0r3d@jkdev:</span> <?php echo "[$date] Tarea Finalizada" ?></div>
				<div class="consola-texto"><span class="texto_consola">Unc3ns0r3d@jkdev:</span> Puede esperar <span id="timer" class="texto_consolar">10</span> segundos a que se rediriga o cerrar desde la "x"<span class="consola-input">_</span></div>
				
				</div>
			</div>
		</div>
	</body>
	<script src="../js/script_timer.js"></script>
</html>

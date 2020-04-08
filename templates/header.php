<?php 
ob_start();
session_start();
date_default_timezone_set("America/Argentina/Buenos_Aires");
require_once 'templates/funcion.php'; 
require_once 'config.php'; 
require_once 'include/iP.php';
if(!isset($_SESSION['logged_in'])){
	header('Location: index.php');
}
/*    elseif ($_SESSION['level'] == "6") {
        header('Location: acc/suspend.php');
        }
*/
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="JKDev">
        <title>Unc3ns0r3d | v3.0</title>
            <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

        <!-- CSS -->
        <link rel="stylesheet" href="vendor/fontawesome/css/all.css"/>
        <link rel="stylesheet" href="vendor/animate.css/animate.css"/>
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="vendor/toastr/toastr.min.css"/>
        <link rel="stylesheet" href="vendor/datatables/datatables.min.css"/>
        <link rel="stylesheet" href="vendor/chosen/chosen.css"/>
        <link rel="stylesheet" href="vendor/clockpicker/clockpicker.css"/>
        <link rel="stylesheet" href="styles/pe-icons/pe-icon-7-stroke.css"/>
        <link rel="stylesheet" href="styles/pe-icons/helper.css"/>
        <link rel="stylesheet" href="styles/stroke-icons/style.css"/>
        <link rel="stylesheet" href="styles/style.css?ver=2">
        <link rel="stylesheet" href="styles/anuncios.css">
        <link rel="stylesheet" href="style/magnific-popup.css">
        <script src="js/navbarclock.js"></script>
        <style>
            .mKey-f{border:0px solid;background-color:transparent;color:white}
        </style>        
    </head>
 <body onload="startTime()">
    <div class="wrapper">
        <nav class="navbar navbar-expand-md navbar-default fixed-top">
            <div class="navbar-header">
                <div id="mobile-menu">
                    <div class="left-nav-toggle">
                        <a href="#">
                            <i class="stroke-hamburgermenu"></i>
                        </a>
                    </div>
                </div>
                <a class="navbar-brand" href="#">
                   <font size="2px">Unc3ns0r3d</font>
                    <span>v.3.0</span>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <div class="left-nav-toggle">
                    <a href="#">
                        <i class="stroke-hamburgermenu"></i>
                    </a>
                </div>
                <form class="navbar-form mr-auto">
                    <input type="text" class="form-control" placeholder="Versión Oficial" style="width: 175px" disabled>
                   
                    
                </form>  
                <ul class="nav navbar-nav">
                    <li class="nav-item uppercase-link">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#rangoModal">Rango
                            <span class="label label-warning"><?php require_once 'funcionLevel.php'; ?></span>
                        </a>
                    </li>
                    <li class="nav-item uppercase-link">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#monederoModal">Monedero
                            <span class="label label-warning"><?php echo $_SESSION['creditos']; ?></span>
                        </a>
                    </li>
                    <li class="nav-item profil-link dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="profile-address">
                                <?php if($_SESSION['logged_in']) { ?>
				                <?php echo $_SESSION['name']; ?></span>
                            <img src="images/profile.jpg" class="rounded-circle" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <?php if($_SESSION['level'] <= "5"){ ?>
                            <a class="dropdown-item" href="perfil.php">Perfil <i class="fas fa-user"></i></a>
                            <a class="dropdown-item" href="configuser.php">Configuración <i class="fas fa-cog"></i></a>
                            <a class="dropdown-item text-info" href="#"><?php echo $IP;?> <i class="fas fa-globe"></i></a>
                            <a class="dropdown-item" href="#"><?php echo date("d/m/y"); ?> <i class="far fa-calendar"></i></a>
                            <a class="dropdown-item" href="#"><?php echo $_SESSION['creditos']; ?> <i class="fas fa-coins"></i><i class="fas fa-cart-plus"></i></a>
                            <?php } ?>
                            <?php if($_SESSION['level'] == "6"){ ?>
                                <a class="dropdown-item" href="#">Cuenta Suspendida <i class="fas fa-frown"></i></a>
                            <?php } ?>
                            <div class="dropdown-divider"></div>
                            <?php if($_SESSION['level'] == "5"){ ?>
                                <a class="dropdown-item" href="panel.php">Admin Panel <i class="fas fa-user-shield"></i></a>
                            <?php } ?>
                            <a class="dropdown-item" href="logout.php">Salir <i class="fas fa-sign-out-alt"></i></a>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    
        
        <aside class="navigation">
        <nav>
            <?php 
            $url = explode("/",$_SERVER['REQUEST_URI']); 
            $uri = end( $url ); 
            
            ?>
            <ul class="nav luna-nav">
                <li class="nav-category">
                </li>
                <li <?php if($uri == 'home.php') echo "class='active'"; ?>><a href="home.php">Inicio</a></li>
                </li>
                <li class="nav-category">
                    Unc3ns0r3d <i class="pe page-header-icon pe-7s-shield"></i>
                </li>
                <?php if($_SESSION['level'] >= 2 && $_SESSION['level'] <= 5){  ?>
                <li>
                    <a href="#paquetes" data-toggle="collapse" aria-expanded="false">
                        PAQUETES <span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="paquetes" class="nav nav-second collapse">
                        <li <?php if($uri == '#') echo "class='active'"; ?>><a href="#">Paquete 1 <i class="far fa-check-circle"></i></a>
                    </ul>
                </li>
                <?php } ?>
                <li>
                    <a href="#herramientas" data-toggle="collapse" aria-expanded="false">
                        HERRAMIENTAS <span class="sub-nav-icon"> <i class="stroke-arrow"></i> </span>
                    </a>
                    <ul id="herramientas" class="nav nav-second collapse">
                        <li <?php if($uri == '#') echo "class='active'"; ?>><a href="encrypt.php">Encrypter <i class="fas fa-cog"></i></a>
                        <li <?php if($uri == '#') echo "class='active'"; ?>><a href="#">Proxy Checker <i class="fas fa-cog"></i></a>
                        <li <?php if($uri == '#') echo "class='active'"; ?>><a href="#">Buscar BIN <i class="fas fa-cog"></i></a>
                    </ul>
                </li>
                <li class="nav-info">
                    
                    <?php } ?>
                    <div class="m-t-xs">
                        <span class="c-white">Unc3ns0r3d</span><br />
                        <strong class="d-inline-block mb-2 text-primary">Versión Oficial</strong>
                        <hr>
                        <span class="label label-warning" id="clock"></span>
                    </div>
                </li>
            </ul>
        </nav>
    </aside>    
<!-- End wrapper-->
<?php require_once 'config.php'; ?>
<?php 
    if(!empty($_POST)){
        try {
            $user_obj = new Cl_User();
            $data = $user_obj->registration( $_POST );
            if($data)$success = USER_REGISTRATION_SUCCESS;
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
?>
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
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- Page title -->
    <title>.::REGISTRO | Unc3ns0r3d </title>

    <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css"/>

    <!-- App styles -->
    <link rel="stylesheet" href="styles/pe-icons/pe-icon-7-stroke.css"/>
    <link rel="stylesheet" href="styles/pe-icons/helper.css"/>
    <link rel="stylesheet" href="styles/stroke-icons/style.css"/>
    <link rel="stylesheet" href="styles/style.css">
    
</head>
<body class="blank">
<div class="wrapper">
    <section class="content">
        <div class="container-center lg animated slideInDown">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-add-user"></i>
                </div>
                <div class="header-title">
                    <h3>Unc3ns0r3d 404</h3>
                </div>
            </div>
            <div class="panel panel-filled">
                <div class="panel-body">
                    <p>
                    <?php require_once 'templates/message.php';?>
                    </p>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="register-form">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Nick</label>
                                <input name="name" id="name" type="text" class="form-control" placeholder="Nick"> 
                                <input type="text" style="visibility:hidden" id="ip_registro" name="ip_registro" value="<?php echo($IP);?>">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Email</label>
                                <input name="email" id="email" type="email" class="form-control" placeholder="Email" > 
                                <span class="help-block"></span>
                            </div>
                             
                            <div class="form-group col-lg-6">
                                <label>Contraseña</label>
                                <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña"> 
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Re Contraseña</label>
                                <input name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Confirmar Contraseña"> 
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Key</label>
                                <input name="key_tcp" id="key_tcp" type="text" class="form-control" placeholder="TCP-XXX-XXX"> 
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-accent" type="submit" id="submit_btn" data-loading-text="Registrando....">Registro</button>
                            <a class="btn btn-default" href="index.php">Ingresar</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!-- End main content-->
</div>
<!-- End wrapper-->

<!-- Vendor scripts -->
<script src="vendor/pacejs/pace.min.js"></script>
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- App scripts -->
<script src="js/jquery.validate.min.js"></script>
<script src="js/register.js"></script>
<script src="scripts/luna.js"></script>

</body>
</html>
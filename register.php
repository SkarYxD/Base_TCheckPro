<?php 
require_once 'config.php'; 
?>
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

<!-- Wrapper-->
<div class="wrapper">


    <!-- Main content-->
    <section class="content">
        <div class="container-center lg animated slideInDown">
            <div class="view-header">
                <div class="header-icon">
                    <i class="pe page-header-icon pe-7s-add-user"></i>
                </div>
                <div class="header-title">
                    <h3>Registro</h3>
                    <small>
                        <3
                    </small>
                </div>
            </div>

            <div class="panel panel-filled">
                <div class="panel-body">
                    <p>

                    </p>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-register" role="form" id="loginform">
                        <?php require_once 'templates/message.php';?>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Usuario</label>
                                <input type="text" value="" id="name" class="form-control" name="name">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Correo</label>
                                <input type="" value="" id="email" class="form-control" name="email">
                                 <span class="help-block"></span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Contraseña</label>
                                <input type="password" value="" id="password" class="form-control" name="password">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Re Contraseña</label>
                                <input type="password" value="" id="confirm_password" class="form-control" name="confirm_password">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Key</label>
                                <input type="text" value="" id="key_tcp" class="form-control" name="key_tcp">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-accent" type="submit" id="submit_btn">Registro</button>
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
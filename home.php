<?php require_once 'templates/header.php';?>
<!-- Main content-->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="view-header">
                        <div class="pull-right text-right" style="line-height: 14px">
                            <small><span class="c-white">Cambios del checker Aqui:</span></small>
                            <br>
                            <small><span class="text-info">Unc3ns0r3d versión 3.0.</span></small>
                            <br>
                            <small><span class="text-info">BETA Terminada.</span></small>
                        </div>
                        <div class="header-icon">
                            <i class="pe page-header-icon pe-7s-shield"></i>
                        </div>
                        <div class="header-title">
                            <h3 class="m-b-xs">Unc3ns0r3d</h3>
                            <small class="text-warning">
                                Sistema único para Checkers Publicos & Privados.
                            </small>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-xs-6">
                    <div class="panel panel-filled">
                        <div class="panel-body text-center">
                            <h2 class="m-b-none">
                              <?php require_once 'include/uCount.php'; ?> <span class="ld-loading"><i class="fa fa-user fa-sm"> </i></span>
                            </h2>

                            <div class="small text-warning">USUARIOS</div>
                            <div class="slight m-t-sm"><i class="fas fa-clock-o">

                           </i> Update: <span class="c-white"><?php include 'include/act.php'; ?></span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-xs-6">
                    <div class="panel panel-filled">
                        <div class="panel-body text-center">
                            <h2 class="m-b-none">
                                <span style="font-size:20px"><?php include 'include/funcionLevel.php'; ?></span> <span class="ld-loading"><i class="fas fa-user-clock fa-sm"></i></span>
                            </h2>
                            <div class="small text-warning">MEMBRESIA</div>
                            <div class="slight m-t-sm"><i class="fa fa-clock-o"> </i> Update: <span class="c-white">0</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-xs-6">
                    <div class="panel panel-filled">
                        <div class="panel-body text-center">
                            <h2 class="m-b-none">
                                2 <span class="ld-loading"><i class="fas fa-rocket fa-sm"></i></span>
                            </h2>
                            <div class="small text-warning">HERRAMIENTAS</div>
                            <div class="slight m-t-sm"><i class="fa fa-clock-o"> </i> Update: <span class="c-white"><?php echo date("H:i"); ?></span></div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-xs-6">
                    <div class="panel panel-filled">
                        <div class="panel-body text-center">
                            <h2 class="m-b-none">
                                <?php require_once 'include/aCount.php'; ?> <span class="ld-loading"><i class="fas fa-users fa-sm"></i></span>
                            </h2>
                            <div class="small text-warning">STAFF</div>
                            <div class="slight m-t-sm"><i class="fa fa-clock-o"> </i> Update: <span class="c-white"><?php include 'include/act_staff.php'; ?></span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                    <div class="panel panel-filled">
                        <div class="panel-body text-center">
                            <h2 class="m-b-none">
                                <?php echo $_SESSION['creditos']; ?> <span class="ld-loading"><i class="fas fa-donate fa-sm"></i></span>
                            </h2>
                            <div class="small text-warning"><a href="#">COMPRAR SALDO</a></div>
                            <div class="slight m-t-sm"><span class="c-white">Ahora puedes comprar tu <u>SALDO</u> de manera fácil y rápida!</span></div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                    <div class="col-md-12">
                        <div class="panel panel-filled">

                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="m-t-xs m-b-none">
                                                Bienvenido <span class="c-accent"><u><?php echo $_SESSION['name']; ?></span></u>
                                            </h2>
                                            <small>
                                                <?php echo $_SESSION['descripcion']; ?>
                                            </small>
                                            <hr>
                                            <h2 class="m-t-xs m-b-none">Noticias & Actualizaciones</h2>
                                    </div>
                                    <div class="col-md-3">
                                        <table class="table small m-t-sm">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    Saldo <strong class="c-white"><?php echo $_SESSION['creditos']; ?> <i class="fas fa-donate fa-sm"></i></strong>
                                                </td>
                                                <td>
                                                     <strong class="c-white">0/0</strong> 
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    LEVEL <strong class="c-white"><?php echo $_SESSION['level']; ?></strong>
                                                </td>
                                                

                                                <td>
                                                    <strong class="c-white">0/0</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <script type="text/javascript">
                                                function mostrarKey(){
                                                                var cambio = document.getElementById("mKey");
                                                                if(cambio.type == "password"){
                                                                        cambio.type = "text";
                                                                        $('.icon').removeClass('far fa-eye-slash').addClass('far fa-eye');
                                                                }else{
                                                                        cambio.type = "password";
                                                                        $('.icon').removeClass('far fa-eye').addClass('far fa-eye-slash');
                                                                }
                                                        } 

                                                        $(document).ready(function () {
                                                        $('#MostrarKey').click(function () {
                                                                $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
                                                        });
                                                });
                                                </script>
                                                 <td colspan="3" style="text-align:right;">
                                                    <div class="fix">
                                                        <button id="mostrar_key" class="btn btn-link" type="button" onclick="mostrarKey()">
                                                            <span class="far fa-eye-slash icon"><input id="mKey" type="Password" class="mKey-f text-warning" value="<?php echo $_SESSION['key_tcp']; ?>" disabled></input></span>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-3 m-t-sm">
                                    <span class="c-white">
                                        <?php echo $_SESSION['email']; ?>
                                    </span>
                                        <br>
                                        <small>
                                            Nunca le des información de tu cuenta a <b>NADIE!</b>, ningún <u>administrador</u> o parte del staff te pedira datos de tu cuenta.
                                        </small>
                                        <br>
                                        <div class="btn-group m-t-sm">
                                            <a href="#" class="btn btn-default btn-sm"><i class="fas fa-bug"></i> BUGS</a>
                                            <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#soporteModal"><i class="fas fa-headset"></i> SOPORTE</a>
                                        </div>


                                    </div>


                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End main content-->
<script src="js/jquery.validate.min.js"></script>
<script src="js/register.js"></script>
</div>
<?php require_once 'templates/footer.php';?>
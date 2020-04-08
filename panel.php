<?php require_once 'templates/header_panel.php';?>

<?php 
    if(!empty($_POST)){
        try {
            $user_obj = new Cl_Script();
            $data = $user_obj->genAccountv1( $_POST );
            if($data)$success = GENACC_CREATE_SUCCESS;
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }

?>

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
                                <span style="font-size:20px"><?php require_once 'include/funcionLevel.php'; ?></span> <span class="ld-loading"><i class="fas fa-user-clock fa-sm"></i></span>
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
                                            <hr class="c-accent">

                                        <div class="tabs-container">
                                            <ul class="nav nav-tabs">
                                                <li><a class="nav-link active" data-toggle="tab" href="#tab-1" aria-expanded="true"> Usuarios Creados</a></li>
                                                <li><a class="nav-link" data-toggle="tab" href="#tab-2" aria-expanded="false">Generar Usuarios</a></li>
                                                <li><a class="nav-link" data-toggle="tab" href="#tab-3" aria-expanded="false">Usuarios Suspendidos</a></li>
                                                <li><a class="nav-link" data-toggle="tab" href="#tab-4" aria-expanded="false">Usuarios Expirados</a></li>
                                                <li><a class="nav-link" data-toggle="tab" href="#tab-5" aria-expanded="false">Editar Usuarios</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="tab-1" class="tab-pane active">
                                                    <div class="panel-body">
                                                        <h4 class="c-accent"># Ultimas ACC Generadas</h4>
                                                        <table id="tablaAcc" class="table table-responsive-sm">
                                                            <thead>
                                                            <tr>
                                                                <th>Email</th>
                                                                <th class="c-accent">Key</th>
                                                                <th class="text-success">Generado</th>
                                                                <th class="text-danger">Rango</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                           
                                                               <?php require_once ('include/accgen_.php'); ?>
                                                           
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div id="tab-2" class="tab-pane">
                                                    <?php require_once ('genAcc.php') ?>
                                                </div>
                                                <div id="tab-3" class="tab-pane">
                                                    <div class="panel-body">
                                                        <h4 class="c-accent">Usuarios Suspendidos</h4>
                                                        <table id="tablaAcc" class="table table-responsive-sm">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-danger">Email</th>
                                                                <th>Motivo</th>
                                                                <th>Tiempo</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                           
                                                               <?php require_once ('include/accsuspend_.php'); ?>
                                                           
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div id="tab-4" class="tab-pane">
                                                    <div class="panel-body">
                                                        <h4 class="c-accent">Lista Usuarios <a href="include/autoDelete.php" target="_blank"><button class="btn btn-accent"><i class="fas fa-eraser"></i></button></a></h4>
                                                        <table id="tablaAcc" class="table table-responsive-sm">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-success">Email</th>
                                                                <th>Level</th>
                                                                <th class="c-accent">Creado</th>
                                                                <th class="text-danger">Expira</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php require_once ('include/accExpire.php'); ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div id="tab-5" class="tab-pane">
                                                    <div class="panel-body">
                                                        <h4 class="c-accent">Editar Usuarios</h4>
                                                        <table id="tablaAcc" class="table table-responsive-sm">
                                                            <thead>
                                                            <tr>
                                                                <th class="text-success">Email</th>
                                                                <th>Level</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php require_once ('include/accEdit.php'); ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="c-accent">
                                            Información
                                        </span>
                                        <br>
                                        <small>
                                            Todo los procesos quedan guardados en un registro para mayor seguridad, si se crea un usuario se queda el registro de quien con lo ha creado con la fecha correspondiente.
                                        </small>
                                        <hr>
                                        <span class="c-accent">
                                            Rangos
                                        </span>
                                        <br>
                                        <small>
                                            <span class="text-info">Nivel 0: Usuario Gratuito</span><br/>
                                            <span class="text-warning">Nivel 1: Usuario VIP I</span><br/>
                                            <span class="text-warning">Nivel 2: Usuario VIP II</span><br/>
                                            <span class="text-warning">Nivel 3: Usuario VIP III</span><br/>
                                            <span>Nivel 4: STAFF</span><br/>
                                            <span class="text-success">Nivel 5: Administrador</span><br/>
                                            <span class="text-danger">Nivel 6: Suspendido</span><br/>
                                        </small>
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
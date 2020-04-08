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
                            <h3 class="m-b-xs">TOOL Encrypter</h3>
                            <small>
                                Sistema único para Checkers Publicos & Privados.
                            </small>
                        </div>
                    </div>
                    <hr>
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
                                            <center>
                                            <form action="#" method="POST">
                                            <div class="form-group">
                                                <input type="text" placeholder="Ingrese una contraseña o texto" name="password" class="form-control" required="required"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Seleccione un tipo de Encriptación</label>
                                                <select name="encryptor" required="required" class="form-control">
                                                    <option value="">Seleccione una Opción</option>
                                                    <option value="md5">md5</option>
                                                    <option value="sha1">sha1</option>
                                                    <option value="ripemd160">ripemd160</option>
                                                    <option value="haval160,4">haval160,4</option>
                                                    <option value="sha256">sha256</option>
                                                </select>
                                            </div>
                                            <center><button name="encrypt" class="btn btn-primary">Encryptar</button></center>
                                            <hr>
                                            <h4 class="text-success" style="word-wrap:break-word;"><?php include 'encrypt_.php'?></h4>
                                            </center>
                                    </div>
                                </div>
    </div>
    </div>
    
           </center>
            </br>
  
    </section>
    
    <!-- End main content-->

</div>
<?php require_once 'templates/footer.php';?>
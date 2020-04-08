<?php require_once 'config.php'; ?>
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
                                                    <div class="panel-body">
                                                        <h4 class="c-accent"># Generar Cuenta</h4>
                                                        <?php require_once 'templates/message.php';?>
                                                        <?php require_once 'include/iP.php'; ?>
                                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="key_create_form" role="form" id="key_create_form">
                                                            <div class="row">
                                                                <div class="form-group col-lg-8">
                                                                    <input name="tcpKey" id="tcpKey" type="text" class="form-control" value="<?php require_once 'include/genKey.php';?>"> 
                                                                    <span class="help-block"></span>
                                                                </div>
                                                                <div class="fix">
                                                                    <button class="btn btn-accent" type="submit" id="submit_btn" data-loading-text="Generando...">Generar</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <span>Sistema de Key/Cuenta creado por <mark>JkDev</mark> para TesteCheck-PRO</span>
                                                    </div>

                                                    <script src="js/genKey.js"></script>
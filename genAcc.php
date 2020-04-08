                                                    <div class="panel-body">
                                                        <h4 class="c-accent"># Generar Cuenta</h4>
                                                        <?php require_once 'templates/message.php';?>
                                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="acc_create_form" role="form" id="acc_create_form">
                                                            <div class="row">
                                                                <div class="form-group col-lg-8">
                                                                    <input name="tcpKey" id="tcpKey" type="text" class="form-control" placeholder="TCP Key" value="<?php require_once 'include/genKey.php';?>" required/> 
                                                                    <span class="help-block"></span>
                                                                </div>
                                                                <div class="form-group col-lg-8">
                                                                    <input name="tcpAss" id="tcpAss" type="text" class="form-control" placeholder="Contraseña" value="<?php require_once 'include/genPass.php';?>" required/> 
                                                                    <span class="help-block"></span>
                                                                </div>
                                                                <div class="form-group col-lg-8">
                                                                    <input type="date" name="expireAcc" id="expireAcc" class="form-control" />
                                                                    <span class="help-block"></span>
                                                                </div>
                                                                <div class="form-group col-lg-8">
                                                                    <input type="creditos" name="creditos" id="creditos" class="form-control" placeholder="Creditos" value="100" required/>
                                                                    <span class="help-block"></span>
                                                                </div>
                                                                <div class="form-group col-lg-8">
                                                                    <select class="form-control input-sm" name="rolAcc" id="rolAcc">
                                                                        <option value="0">Usuario Gratis</option>
                                                                        <option value="1">Suscripcion Nivel 1</option> 
                                                                        <option value="2">Suscripcion Nivel 2</option> 
                                                                        <option value="3">Suscripcion Nivel 3</option>
                                                                        <option value="4">Miembro Staff</option>
                                                                        <option value="5">Administrator</option>
                                                                        <option value="6">Suspendido</option>
                                                                    </select> 
                                                                </div>
                                                                <div class="form-group col-lg-8">
                                                                    <input name="nAdmin" id="nAdmin" type="text" class="form-control" placeholder="Generado por" value="<?php echo $_SESSION['name']; ?>" required/> 
                                                                    <span class="help-block"></span>
                                                                </div>
                                                                <div class="form-group col-lg-8">
                                                                    <input name="myIP" id="myIP" type="text" class="form-control" placeholder="127.0.0.1" value="<?php echo $IP;?>" readonly/> 
                                                                    <span class="help-block"></span>
                                                                </div>

                                                                <div class="fix">
                                                                    <button class="btn btn-accent" type="submit" id="submit_btn" data-loading-text="Generando...">Generar</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <hr>
                                                        <p><span><b class="c-accent">Key Gen:<br /></b>
                                                            <ul>
                                                                <li>Antes de generar una Key verificar que este correctamente generada.</li>
                                                                <li>Debe de tener un total de 11 caracteres.</li>
                                                            </ul>
                                                            <b class="c-accent">La lista de rangos son las siguientes:</b><br>
                                                            <ul>
                                                                <li>Usuario Gratis: Pre definido.</li>
                                                                <li>Suscripción Nivel 1: Depende del pago.</li>
                                                                <li>Suscripción Nivel 2: Depende del pago.</li>
                                                                <li>Suscripción Nivel 3: Depende del pago.</li>
                                                                <li>Staff: Rango para modificar ciertos parametros del sistema.</li>
                                                                <li>Administrador: Rango para tener acceso total.</li>
                                                                <li>Suspendido: Cuenta bloqueada.</li>   
                                                            </ul>
                                                            <br>
                                                            <b class="c-accent">Fecha de expiración:</b><br>
                                                            <ul>
                                                                <li>Editar el DATE como MES/DIA/AÑO</li>
                                                                <li>Ej: 01/01/2020</li>
                                                            </ul>
                                                        </span></p>
                                                        <hr>
                                                        <p><span>Sistema de Key/Usuario creado por <mark>JkDev</mark> para Unc3ns0r3d </span></p>
                                                    </div>
                                                    <script src="js/genAcc.js"></script>
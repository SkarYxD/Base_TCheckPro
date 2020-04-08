<?php require_once 'templates/header.php';?>
<?php 
  if( !empty( $_POST )){
    try {
      $user_obj = new Cl_User();
      $data = $user_obj->account( $_POST );
      if($data)$success = USER_UPDATE_SUCCESS;
    } catch (Exception $e) {
      $error = $e->getMessage();
    } 
  }
?>
  <script src="http://maps.google.com/maps?file=api&v=2&key=AIzaSyB8WA1ixWF0p1q5pSV51_pjj45IaOzQzX0" type="text/javascript"></script>
  <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
 
  <script type="text/javascript">
    function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GLargeMapControl());
        map.addControl(new GMapTypeControl());
        map.setCenter(new GLatLng(geoplugin_latitude(), geoplugin_longitude()), 12);
      }
    }
  </script>

<div class="content">
      <div class="container">
          <div class="row mb-2">
          <div class="col-md-6">
            <h1>Configuración:</h1>
              <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="account-form" method="post" class="form-horizontal myaccount" role="form">
                  <p>
                        <div class="form-group mx-sm-3 mb-2">
                          <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                        </div>
                    </p>
                    <p>
                        <div class="form-group mx-sm-3 mb-2">
                          <input name="name" id="name" type="text" class="form-control" value="<?php echo $_SESSION['name']; ?>">
                          <strong class="d-inline-block mb-2 text-primary">Nombre</strong>
                        </div>
                    </p>
                    <p>
                        <div class="form-group mx-sm-3 mb-2">
                          <input name="email" id="email" type="text" class="form-control" value="<?php echo $_SESSION['email']; ?>">
                          <strong class="d-inline-block mb-2 text-primary">Email</strong>
                        </div>
                    </p>
                    <p>
                        <div class="form-group mx-sm-3 mb-2"> 
                          <input name="descripcion" id="descripcion" type="text" class="form-control" value="<?php echo $_SESSION['descripcion']; ?>">
                          <strong class="d-inline-block mb-2 text-primary">Descripción</strong>
                        </div>
                    </p> 
                    <p>
                        <div class="form-group mx-sm-3 mb-2"> 
                          <button class="btn btn-info" type="submit" id="submit_btn" data-loading-text="Actualizando...">Actualizar</button>
                        </div>
                    <p>
                    <p>
                      <?php require_once 'templates/message.php';?>
                    </p>
                    </form>
                </div>
              </div>
          </div>
          <div class="col-md-6">
            <h1>Información:</h1>
              <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <form class="form-horizontal myaccount">
                      <p>
                      
                      <div class="form-group mx-sm-3 mb-2">
                        <input type="text" class="form-control" value="<?php echo $_SESSION['name']; ?>" readonly/>
                        <strong class="d-inline-block mb-2 text-primary"> Usuario</strong>
                      </div>
                      </p>
                      <p>
                        <div class="form-group mx-sm-3 mb-2"> 
                          <input type="text" class="form-control" value="<?php echo $_SESSION['email']; ?>" readonly/>
                          <strong class="d-inline-block mb-2 text-primary"> Email</strong>
                        </div>
                        </p>
                        <p>
                        <div class="form-group mx-sm-3 mb-2"> 
                          <input type="text" class="form-control" value="<?php require_once 'include/funcionLevel.php'; ?>" readonly/>
                          <strong class="d-inline-block mb-2 text-primary"> Tipo de Cuenta</strong>
                        </div>
                        </p>
                        <p>
                        <div class="form-group mx-sm-3 mb-2"> 
                          <input type="text" class="form-control" value="<?php echo $_SESSION['creditos']; ?>" readonly/>
                          <strong class="d-inline-block mb-2 text-primary"> Creditos</strong>
                        </div>
                        </p>
                        <p>
                        <div class="form-group mx-sm-3 mb-2"> 
                          <input type="text" class="form-control" value="<?php echo $_SESSION['created']; ?>" readonly/>
                          <strong class="d-inline-block mb-2 text-primary"> F. Creación</strong>
                        </div>
                        </p>
                        <?php if($_SESSION['level'] >= 2 && $_SESSION['level'] <= 4){  ?>
                          <p>
                        <div class="form-group mx-sm-3 mb-2"> 
                          <input type="text" class="form-control" value="<?php echo $_SESSION['expireAcc']; ?>" readonly/>
                          <strong class="d-inline-block mb-2 text-primary"> F. Expiración</strong>
                        </div>
                        </p>
                        <?php } ?>
                    </form>
                </div>
            </div>
          </div>
        </div>
        <br>
        <center>
        <?php
          $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$IP));
          if($query && $query['status'] == 'success') {
            echo 'Estas Navegando desde '.$query['country'].', '.$query['city'].'!';
          } else {
            echo 'No hay localizacion actual';
          }
        ?>
        <hr>
            <div id="map" style="width: 500px; height: 300px"></div>
              <script>load();</script>
        </center>
        <br><br>
        
        </div>
    </div> <!-- /container -->
<?php require_once 'templates/footer.php';?>
    


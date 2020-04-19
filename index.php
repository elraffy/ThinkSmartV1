<?php
require_once "clases/Conexion.php";
          $obj = new conectar();
          $conexion = $obj->conexion();

          $sql ="SELECT * FROM usuarios WHERE usuario='SYSDEV'";
          $result= mysqli_query($conexion,$sql);
          $validar=0;

              if (mysqli_num_rows($result) > 0 ) {
                $validar=1;
              }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login  de Usuario</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="js/funciones.js"></script>

  </head>
<body style="background: rgb(249,252,247); /* Old browsers */
background: -moz-linear-gradient(-45deg, rgba(249,252,247,1) 0%, rgba(245,249,240,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg, rgba(249,252,247,1) 0%,rgba(245,249,240,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg, rgba(249,252,247,1) 0%,rgba(245,249,240,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9fcf7', endColorstr='#f5f9f0',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */)">        <br><br> <br>

          <div class="container">

                <div class="row">
                  <div class="col-sm-4"></div><!--col-sm-4-->
                  <div class="col-sm-4">
                      <div class="panel panel-success">
                          <div class="panel panel-heading"> <i><bold>Sistema de Ventas <i class="fas fa-mobile-alt"></i></bold></i></div><!--panel panel-heading-->
                            <div class="panel panel-body">
                                <p>
                                    <center><img src="img/Logo_ThinkSmart.png" height="190px"alt="logo de ventas"></center>
                                </p>
                                      <form id="frmLogin" action="index.html" method="post">

                                              <label style="color: #3683bc">Usuario </label>
                                              <input type="text" class="form-control input-sm" name="usuario" id="usuario">
                                              <label  style="color: #3683bc">Contraseña </label>
                                              <input type="password" class="form-control input-sm" name="password" id="password">
                                              <p></p>
                                              <span class="btn btn-success btn-sm" id="entrarSistema">Entrar <i class="fas fa-archway"></i></span>
                                              <?php  if (!$validar) : ?>
                                                  <a href="registro.php" class="btn btn-danger btn-sm">Registrar <i class="far fa-address-book"></i></a>
                                                <?php endif; ?>
                                      </form>

                            </div><!--panel panel-body-->

                      </div><!--panel panel-primary-->

                  </div><!--col-sm-4-->
                  <div class="col-sm-4"></div>

                  </div><!--row-->


          </div><!--container-->

  </body>
</html>     


    <script type="text/javascript">
          $(document).ready(function(){
            $('#entrarSistema').click(function(){

              vacios=validarFormVacio('frmLogin');
                  if (vacios > 0) {
                      alert("Debes llenar todos los campos!!");
                      return false;

                  }

              datos=$('#frmLogin').serialize();
              $.ajax({
                type:"POST",
                data:datos,
                url:"procesos/regLogin/login.php",
                success:function(r){
                      if (r==1) {
                          window.location="vistas/inicio.php";

                      }else {
                        alert("No se Pudo Acceder :(");
                      }

                }
              });
            });


          });

    </script>                                                                                                                                                                                                                                                                                                                                                                              

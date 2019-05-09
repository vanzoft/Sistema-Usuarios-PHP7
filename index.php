<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administración | Web</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
	 <? include("ssi/secure_ini.php"); ?>
  <? include("usuarios/modal_recuperar.php"); ?>
	
<div class="login-box">
  <div class="login-logo" style="color: #FFFFFF;">
	
    <a href="index.php"><b>Administración</b>&nbsp;WEB</a>
  </div>
  <!-- /.login-logo -->
	 <?php  
 
      if (empty($_GET['alert'])) {
        echo "";
      } 

      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i> Error al entrar!</h4>
               Usuario o la contraseña es incorrecta, vuelva a verificar su nombre de usuario y contraseña.
              </div>";
      }

      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exito!!</h4>
              Has salido con éxito.
              </div>";
		   session_destroy(); 
      }
	 elseif ($_GET['alert'] == 3) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Exito!!</h4>
              Cambio realizado con éxito, Inicia sesión nuevamente!! 
              </div>";
      }
	elseif ($_GET['alert'] == 4) {
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i> Acceso Restringido!</h4>
               Necesitas estar logueado para accesar a esta pagina.
              </div>";
      }
	elseif ($_GET['alert'] == 5) {
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i> La session a expirado!</h4>
               Necesitas estar logueado para accesar a esta pagina.
              </div>";
      }
      ?>

<div class="login-box-body">
    <p class="login-box-msg">Inicio de sesión</p>

	<form id="Form"  role="Form" method="POST">
									
									<div id="respuesta_login"></div>
          <div class="form-group has-feedback">
			<label>Usuario:</label>
            <input type="email" id="email_login" name="email" class="form-control" placeholder="Ingresa el email de usuario" required >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
			<label>Contraseña:</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
          
			  <div class="col-xs-8" >
				
             <a  data-toggle="modal" data-target="#myModal" href="#myModal">¿Se te olvidó tu contraseña?</a>
			 
            </div>
            <div class="col-xs-4">
				
            	<button type="submit" name="enviar" class="btn btn-success btn-block btn-flat" >Entrar <i class="fa fa-sign-in"></i></button>
            </div><!-- /.col -->
			
          </div>
        </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script src="../dist/js/app_pass.js"></script>
</body>
</html>

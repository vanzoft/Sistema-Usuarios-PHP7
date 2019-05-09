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
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="login-logo" style="color: #FFFFFF;">
	
    <a href="index.php"><b>Administración</b>&nbsp;WEB</a>
  </div>
  <!-- User name --><div id="respuesta_login"></div>
  <div class="lockscreen-name"><?php echo $_SESSION['nombre_usuario']; ?> </div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="../../dist/img/<?php echo $_SESSION['usuario_avatar']; ?>" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form id="Form"  role="Form" method="POST" class="lockscreen-credentials">
									
									
		 <input type="hidden" id="email_login" name="email" class="form-control"  value="<?php echo $_SESSION['Email']; ?>">
      <div class="input-group">
        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required >

        <div class="input-group-btn">
          <button type="submit" name="enviar" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="text-center">
    Ingrese su contraseña para recuperar su sesión
  </div>
  <div class="text-center">
    <a href="index.php" style="color: #FFFFFF">O inicia sesión como un usuario diferente</a>
  </div>
  
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script src="../dist/js/app_pass.js"></script>
</body>
</html>

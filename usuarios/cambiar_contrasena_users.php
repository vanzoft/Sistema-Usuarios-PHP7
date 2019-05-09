<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PERFIL | ACAT MEXICANA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<?php require("../secure.php"); ?>
<div class="wrapper">
  <?php include("../head.php"); ?>
<?php include("../sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		  <h1>
		  <span class="glyphicon glyphicon-user"></span> Perfil de Usuario 
			<small>ACAT Mexicana</small>
		  </h1>
		   <?php include("../breadcrumb.php"); ?>
		</section>

    <!-- Main content -->
    <section class="content">


    <?php
		include '../conn.php';	
			
			// Connection variables
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
		

		
        if(isset($_SESSION['Email'])) { // comprobamos que la sesión esté iniciada
            if(isset($_POST['enviar'])) {
                if($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) {
                    echo  '<div class="callout callout-warning">
                <h4>Las contraseñas ingresadas no coinciden.!</h4>

                <p> <a href="javascript:history.back();">Reintentar</a></p>
              </div>';
                }else {
                     	$_SESSION['Email'] = $row['Email'];
					$username= $_POST["id"];
				   	$pass= $_POST["password"];
                    $passHash = password_hash($pass, PASSWORD_DEFAULT);
					$sql = "UPDATE users SET Password='$passHash' WHERE Id='$username'";
					$query_update = mysqli_query($conn,$sql)or die("Error en consulta <br>MySQL dice: ".mysql_error()); 
					
					        
                    if($query_update) {
                      
						  echo' <div class="callout callout-success">
                <h4>Contraseña cambiada correctamente.!</h4>  </div>';
						session_unset($_SESSION['email']);

                    }else {
                        echo '<div class="box-body">
              <div class="callout callout-danger">
                <h4>Error: No se pudo cambiar la contraseña!</h4> <p><a href="javascript:history.back();">Reintentar</a></p>
              </div>. ';
                   }
                }
            }else {
    ?><div class="col-xs-4">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="form-inline" role="form">
            
            
            <select name="id" id="id"   style="width: 200px;" class="form-control">
                             <option value="-">Seleccionar Usuario</option>
                <?php 
				

							
$eq = "Select * from users order by nombre_usuario";
					$query_update = mysqli_query($conn,$eq)or die("Error en consulta <br>MySQL dice: ".mysql_error()); 
					

{ 
while($row = mysqli_fetch_array($query_update)){
	echo "<option value=".$row['Id'].">".$row['Id']."".$row['nombre_usuario']."</option> \n";
}
 } ?></select><br/> 
                <label>Nueva contraseña:</label><br />
                <input type="password" name="password" maxlength="15" class="form-control"/><br />
                <label>Confirmar:</label><br />
                <input type="password" name="password_conf" maxlength="15" class="form-control"/><br />
                <input type="submit" name="enviar" value="Enviar" class="btn btn-primary"/>
            </form></div>
    <?php
            }
        }else {
            echo '<div class="box-body">
              <div class="callout callout-danger">
                <h4>Acceso denegado.!</h4> <p><a href="javascript:history.back();">Reintentar</a></p>
              </div>.';
        }
    ?> 
  <script src="https://code.jquery.com/jquery.js"></script>
  <script src="../equipos/js/bootstrap.min.js"></script>
     
  
	</div>
	   <?php include("footer.php"); ?>
</body>
</html>
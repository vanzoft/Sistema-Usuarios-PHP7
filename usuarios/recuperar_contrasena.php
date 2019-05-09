
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

	
<div class="login-box">
  <div class="login-logo" style="color: #FFFFFF;">
	
    <a href="index.php"><b>Administración</b>&nbsp;WEB</a>
  </div>

  <div class="login-box-body">
    <h3>
		  Cambiar contraseña<br>
			<small><span class="glyphicon glyphicon-user"></span>  <? echo $email = $_GET['email']; ?></small>
		  </h3>
    <?php
	
			
			
        if(isset($_GET['token'])) { ?>
			
			  <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
               <input type="hidden" name="email"  value="<? echo $email = $_GET['email']; ?>"/>
			   <input type="hidden" name="token" value="<? echo $token = $_GET['token']; ?>"/>
                <label>Nueva contraseña:</label><br />
                <input type="password" name="password" maxlength="15" class="form-control" required/><br />
                <label>Confirmar:</label><br />
                <input type="password" name="password_conf" maxlength="15" class="form-control" required/><br />
                <input type="submit" name="enviar" value="Enviar" class="btn btn-primary"/>
            </form>
			
			
			
			
			
			<?
			}else {
			include '../conn.php';	
			$email = $_POST['email'];
			$token = $_POST['token'];
			// Connection variables
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			// comprobamos que se han enviado los datos del formulario
			
			$query = "SELECT * FROM users WHERE Email = '$email' and token = '$token' ";

$result = $con->query($query);

	// Variable $count hold the result of the query
	$count = mysqli_num_rows($result);

	// If count == 1 that means the email is already on the database
	if ($count == 1) {
			
		
		
		    while ($fila = $result->fetch_assoc()) {
           
			$fecha = date("Y-m-d  H:i:s");
			
			$fecha_exp = $fila["token_fexp"];
		
		
		
		
			if ( $fecha < $fecha_exp) {

            if($_POST['password'] != $_POST['password_conf']) {
                    echo '<div class="callout callout-warning">
                <h3><span class="glyphicon glyphicon-exclamation-sign"></span> Error: </h3></br> <h4>Las contraseñas ingresadas no coinciden.!</h4>

                <p> <a href="javascript:history.back();">Reintentar</a></p>
              </div>';
                }else {
				 
                  	$email = $_POST['email'];
				   	$pass= $_POST["password"];
                    $passHash = password_hash($pass, PASSWORD_DEFAULT);
					$sql = "UPDATE users SET Password='$passHash', token='cambiada', token_fexp='$fecha'  WHERE Email = '$email'";
					$query_update = mysqli_query($conn,$sql)or die("Error en consulta <br>MySQL dice: ".mysql_error()); 
					
					           
                    if($query_update) {
                      
						  echo' <div class="callout callout-success">
                 <h3><span class="glyphicon glyphicon-ok-sign"></span>  </h3></br><h4>Contraseña cambiada correctamente.!</h4>  </div>';
						
						echo '<META HTTP-EQUIV=Refresh //CONTENT="1; URL=../index">';
                    }else {
                        echo '<div class="box-body">
              <div class="callout callout-danger">
                <h3><span class="glyphicon glyphicon-remove-sign"></span> Error: </h3> </br> <h4>No se pudo cambiar la contraseña!</h4> </br> <p><a href="javascript:history.back();">Reintentar</a></p>
              </div>. ';
                    }
                }
       }else { echo '<div class="box-body">
              <div class="callout callout-danger">
                <h3><span class="glyphicon glyphicon-remove-sign"></span> Error: </h3> </br><h4>No se pudo cambiar la contraseña, Fecha de token expirada '.$fecha_exp.' !</h4> </br><p><a href="../index">Solicitar de nuevo contraseña</a></p>
              </div>. ';
			}   }
				
			
			
			} else {
		
		 echo '<div class="box-body">
              <div class="callout callout-danger">
                <h3><span class="glyphicon glyphicon-remove-sign"></span> Error: </h3></br><h4>No se pudo cambiar la contraseña, no coinciden </h4> </br> <p>email: '.$email.' </br>  token: '.$token.' </p><p><a href="javascript:history.back();">Reintentar</a></p>
              </div>. ';
		
		}

        }
    ?> 
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

	
 
	 </body>
</html>

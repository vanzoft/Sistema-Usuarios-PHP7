<?php
session_start();
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perfil | WEB</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
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

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
		
		
		
	 if(isset($_POST['enviar'])) {
	// Query to check if the email already exist
	$checkEmail = "SELECT * FROM users WHERE Email = '$_POST[email]' ";

	// Variable $result hold the connection data and the query
	$result = $conn-> query($checkEmail);

	// Variable $count hold the result of the query
	$count = mysqli_num_rows($result);

	// If count == 1 that means the email is already on the database
	if ($count == 1) {
	echo "<div class='alert alert-warning' role='alert'>
					<p>That email is already in our database.</p>
					<p><a href='login.html'>Please login here</a></p>
				</div>";
	} else {	
	
	/*
	If the email don't exist, the data from the form is sended to the
	database and the account is created
	*/
	$name = $_POST['name'];
	$nombre_usuario = $_POST['nombre_usuario'];	
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$usuario_perfil = $_POST['usuario_perfil'];	
	$usuario_avatar = "avatar_default.png";
	$usuario_freg = date("Y-m-d H:i:s");
	// The password_hash() function convert the password in a hash before send it to the database
	$passHash = password_hash($pass, PASSWORD_DEFAULT);
	
	// Query to send Name, Email and Password hash to the database
	$query = "INSERT INTO 
	users  (Name, nombre_usuario, Email, Password, usuario_perfil, usuario_avatar, usuario_freg)
	VALUES ('$name', '$nombre_usuario', '$email', '$passHash', '$usuario_perfil', '$usuario_avatar', '$usuario_freg')";

	if (mysqli_query($conn, $query)) {
		echo "<div class='alert alert-success' role='alert'><h3>Your account has been created.</h3>
		";		
		} else {
			echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}	
	}	
	mysqli_close($conn);
	 }else {
    ?>
		<div class="row">
			<div class="col-sm-12">
				<h1>Registro de usuario</h1>
						
			</div>	
	</div>
       <div class="row">	
		<div class="col-sm-12 col-md-6 col-lg-6">
			
      <form action="create-account.php" method="post" role="form">
			<div class="form-group">	
		  <label>Usuario:</label>
				<input type="text" class="form-control" name="name" placeholder="Ingrese usuario" required>	
				 </div>
		  
		  <div class="form-group">		
				<label>Nombre:</label><br />
		<input type="text" class="form-control" name="nombre_usuario" placeholder="Ingrese nombre" required>	
				 </div>
		  
		  <div class="form-group">		<label>E-mail:</label>
				<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Ingrese E-mail" required>
				 </div>
		  
		  <div class="form-group">		 <label>Perfil:</label>
               <select name="usuario_perfil">
                  <option value="1">Adminstrador</option>
                  <option value="2">Usuario</option>
          </select><br />
			 </div>
		  
		  <div class="form-group">			<label>Nueva contraseña:</label><br />
				<input type="password" class="form-control" name="password" placeholder="Crear Password" required>
		 </div>
		  
		  <div class="form-group">		<label>Confirmar:</label>
                <input type="password" name="password_conf" maxlength="15" class="form-control" placeholder="Confirmar Password"/>
			  
			  <div class="form-group">	
        <input type="submit" name="enviar" value="Enviar" class="btn btn-primary"/></div></div></div></div>
            </form>
    <?php
        }
          
       
    ?> 

 </section>
    <!-- /.content -->
	   
        <!-- /.modal -->
	    
        <!-- /.modal -->
  </div>
  <!-- /.content-wrapper -->
 <?php include("../footer.php"); ?>

 
	 </body>
</html>

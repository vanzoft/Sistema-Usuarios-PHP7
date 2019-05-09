<?php
session_start();
?>

		
			<?php
			// Connection info. file
			 include('../conn.php'); 	
			
			// Connection variables
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$email = $_POST['email']; 
			$password = $_POST['password'];
			$result = mysqli_query($conn, "SELECT * FROM users WHERE Email = '$email'");
			$row = mysqli_fetch_assoc($result);
			$hash = $row['Password'];
			if (password_verify($_POST['password'], $hash)) {	
				session_name("loginUsuario"); 
				session_start(); 
				$_SESSION['autentificado']= "SI";
       			$_SESSION['ultimoAcceso']= date("Y-n-j H:i:s");
     
				$_SESSION['loggedin'] = true;
				$_SESSION['Id'] = $row['Id'];
				$_SESSION['name'] = $row['Name'];
				$_SESSION['nombre_usuario'] = $row['nombre_usuario'];
				$_SESSION['usuario_avatar'] = $row['usuario_avatar'];
				$_SESSION['Email'] = $row['Email'];
				$_SESSION['usuario_freg'] = $row['usuario_freg'];
				$_SESSION['usuario_perfil'] = $row['usuario_perfil'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (30 * 60) ;						
/*seccion log*/
$usuario =$_SESSION['Email'] = $row['Email'];
$star = date("Y-m-d  H:i:s");
$Id_users = $_SESSION['Id'] = $row['Id'];				
$sql = "INSERT INTO logs  (email, start, Id_user) VALUES ('$usuario','$star','$Id_users')";
$query_update = mysqli_query($con,$sql)or die("Error en consulta <br>MySQL dice: ".mysqli_error($con)); 
/*fin seccion log*/

    exit(json_encode(
          ["status"=>"OK",
           "Location"=>"/inicio.php", 
           "mensaje"=>"<div class='alert alert-success alert-dismissable'>cargando página...<img src='../dist/img/loader.gif' width='5%''></div>"]
        ));
				
			
			} else {
				exit(json_encode(
        ["status"=>"ERR",
         "Location"=>"index.php", 
         "mensaje"=>"<div class='alert alert-danger alert-dismissable'>Contraseña incorrecta para el correo: <BR>$email</div>"]
      ));
							
			}	
			?>
		
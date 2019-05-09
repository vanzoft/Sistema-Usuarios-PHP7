<?php
session_start();

?>

 <?php
include '../conn.php';	
			
			// Connection variables
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

if (isset($_SESSION['Id'])) {
        //asignar a variable
        $usernameSesion = $_SESSION['Id'];
        //asegurar que no tenga "", <, > o &
        $username = htmlspecialchars($usernameSesion);   }    

 

        if(isset($_SESSION['Email'])) { // comprobamos que la sesión esté iniciada
            if(isset($_POST['enviar'])) {
                if($_POST['usuario_clave'] != $_POST['usuario_clave_conf']) {
                    echo '<div class="callout callout-warning">
                <h4>Las contraseñas ingresadas no coinciden.!</h4>

                <p> <a href="javascript:history.back();">Reintentar</a></p>
              </div>';
                }else {
				 
                  	$_SESSION['Email'] = $row['Email'];
				   	$pass= $_POST["password"];
                    $passHash = password_hash($pass, PASSWORD_DEFAULT);
					$sql = "UPDATE users SET Password='$passHash' WHERE Id='$username'";
					$query_update = mysqli_query($conn,$sql)or die("Error en consulta <br>MySQL dice: ".mysql_error()); 
					
					           
                    if($query_update) {
                      
						  echo' <div class="callout callout-success">
                <h4>Contraseña cambiada correctamente.!</h4>  </div>';
						session_unset($_SESSION['email']);
session_destroy();
						echo '<META HTTP-EQUIV=Refresh //CONTENT="1; URL=../inicio.php">';
                    }else {
                        echo '<div class="box-body">
              <div class="callout callout-danger">
                <h4>Error: No se pudo cambiar la contraseña!</h4> <p><a href="javascript:history.back();">Reintentar</a></p>
              </div>. ';
                    }
                }
            }else {
    ?>
       
            <form action="cambiar_contrasena.php" method="post" class="form-inline" role="form">
                <label>Nueva contraseña:</label><br />
                <input type="password" name="password" maxlength="15" class="form-control"/><br />
                <label>Confirmar:</label><br />
                <input type="password" name="password_conf" maxlength="15" class="form-control"/><br />
                <input type="submit" name="enviar" value="Enviar" class="btn btn-primary"/>
            </form>
    <?php
            }
        }else {
            echo "Acceso denegado.";
        }
    ?> 

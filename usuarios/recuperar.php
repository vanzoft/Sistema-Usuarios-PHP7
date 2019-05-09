<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
	$email=$_POST['email'];
	$enviar=$_POST['enviar'];

        if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos del formulario
            if(empty($email)) {
                echo '
   <div class="alert alert-danger alert-dismissable">
      
        <strong>No ha ingresado el usuario. </strong>
    </div>    
 ';
            }else {
              
    include('../conn.php'); 
	// Query to check if the email already exist
	$query = "SELECT * FROM users WHERE Email = '$email' ";

$result = $con->query($query);

	// Variable $count hold the result of the query
	$count = mysqli_num_rows($result);

	// If count == 1 that means the email is already on the database
	if ($count == 1) {
		
		$now = date("Y-m-d  H:i:s");

		
		            $num_caracteres = "10"; // asignamos el número de caracteres que va a tener la nueva contraseña
                    $nueva_clave = substr(md5(rand()),0,$num_caracteres); // generamos una nueva contraseña de forma aleatoria
                    $usuario_clave = "$nueva_clave"; // la nueva contraseña que se enviará por correo al usuario
                    $email=$_POST['email'];
                    $passHash = password_hash($usuario_clave, PASSWORD_DEFAULT);
		            $token = uniqid('id_');
		            $token_fexp = date("Y-m-d  H:i:s",strtotime($now."+ 1 days"));
					$sql = "UPDATE users SET Password='$passHash', token='$token', token_fexp='$token_fexp' WHERE email='$email'";
					$query_update = mysqli_query($con,$sql)or die("Error en consulta <br>MySQL dice: ".mysqli_error($con)); 

/* Create a new PHPMailer object. */
$mail = new PHPMailer();
   /* SMTP parameters. */
   $mail->isSMTP();
   $mail->Host = ' ';
   $mail->SMTPAuth = TRUE;
   $mail->SMTPSecure = 'tls';
   $mail->Username = ' ';
   $mail->Password = ' ';
   $mail->Port = 587;
   
   /* Disable some SSL checks. */
   $mail->SMTPOptions = array(
      'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
      )
   );
		
		
$mail->setFrom('noreply@vanzoft.com', 'ADMIN | WEB');
$mail->AddAddress("$email");  // Add a recipient
$mail->addBCC(' ');		
$mail->Subject = utf8_decode('Cambio de contraseña');
/* Set the mail message body. */
$body .= "<table style='padding: 10px; background-color: #eeeeee; font-family: Arial; font-size: 11px;' border='0' cellspacing='0' cellpadding='0' width='100%'>
<tbody>
<tr>
<td align='center'>
<table style='background-color: #ffffff;' border='0' cellspacing='0' cellpadding='0' width='90%'>
<tbody>
<tr><td style='color: #888888;padding:10px;' align='left' colspan='2'><h2> CAMBIO DE CONTRASEÑA: </h2><hr style='color:#3D66B5;' /></td></tr>
<tr> <td  valign='top' style='padding: 10px;'>Correo: </td>
<td  valign='top' style='padding: 10px;'>" .  $email . "</td>
</tr>
<tr><td valign='top' style='padding: 10px;'>Nueva contraseña:</td>
<td valign='top' style='padding: 10px;'><a href='http://test.vanzoft.com/usuarios/recuperar_contrasena?token=" . $token . "&email=" .  $email . " ' class='btn btn-primary'>RESTABLECER CONTRASEÑA</strong></td>
</tr>

<tr><td style='background-color: #505050; color: #c8c8c8;padding:20px;' height='61' align='left' valign='middle' colspan='2'>© 2019 CARPETA FISCAL - JINZAI </td>
</tr>
</tbody>
</table>
";  		

$mail->Body = utf8_decode($body);
$mail->AltBody = "Restablecer contraseña"; // Texto sin html
   



/* Finally send the mail. */
if(!$mail->Send()) {
                        echo '<div class="alert alert-danger alert-dismissable">No se ha podido enviar el email.</div> ';
                    }else {
                       
						 echo '
       <div class="alert alert-success alert-dismissable"> <strong>Un link para restablecer la contraseña, ha sido enviada al email asociado al usuario <strong>'.$email.'</strong><div>
   ';
                    }
		
		
	} else {
       
                    echo '<div class="alert alert-danger alert-dismissable">El correo <strong>'.$email.'</strong> no está registrado. </div>
   ';
                }
            }
        }else { echo '<strong>No se ha podido enviar el email. '.$email.'</strong>
   ';
  
        }
    ?> 
</body>
</html>

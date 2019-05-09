<?php
include($_SERVER['DOCUMENT_ROOT'].'/conn.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>CHAT CON PHP, MYSQL Y AJAX</title>
	
	<link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">

	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();

			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET', '/usuarios/chat/chat.php', true);
			req.send();
		}

		//linea que hace que se refreseque la pagina cada segundo
		setInterval(function(){ajax();}, 1000);
	</script>
</head>
<body onload="ajax();">

	<div id="contenedor">
		<div id="caja-chat">
			<div id="chat"></div>
		</div>

		<form method="POST" action="index.php">
			<input type="text" name="nombre" placeholder="Ingresa tu nombre" class="form-control">			
			<textarea name="mensaje" placeholder="Ingresa tu mensaje" class="form-control"></textarea>
			<input type="submit" name="enviar" value="Enviar" class="bt btn-sucess">
		</form>

		<?php
			if (isset($_POST['enviar'])) {
				
				$nombre = $_POST['nombre'];
				$mensaje = $_POST['mensaje'];


				$consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";

				$ejecutar = $con->query($consulta);

				
			}

		?>
	</div>

</body>
</html>
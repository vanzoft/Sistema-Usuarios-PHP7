<?php
// Connection info. file
			include '../conn.php';	
			
			// Connection variables
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
$accion=$_GET['accion'];

if ($accion == "existente")  {
$id=$_GET['user'];
$archivo=$_GET['archivo'];	
	 
	 $eq = "UPDATE users SET usuario_avatar='$archivo' WHERE id='$id'";
$query_update = mysqli_query($conn,$eq)or die("Error en consulta <br>MySQL dice: ".mysql_error());   
   
	   //echo "<p align='center'>&nbsp;</p><p align='center'>$status</a>";
 echo "Imagen $archivo cambiada correctamente!!!.";
session_unset($_SESSION['email']);
session_destroy();

echo '<META HTTP-EQUIV=Refresh //CONTENT="0; URL=../index.php?alert=3">';
	
}else {
	
	
	
	
	

	
$archivo=$_POST['archivo'];	
//comprobamos si ha ocurrido un error.
if ($_FILES["archivo"]["error"] > 0){
 echo "ha ocurrido un error";
} else {

                $fechaactual  = date("dHi");  //Fecha Actual       
  $no_aleatorio  = rand(10, 99); //Generamos dos Digitos aleatorios
                //esta es la ruta donde copiaremos la imagen
  //recuerden que deben crear un directorio con este mismo nombre
  //en el mismo lugar donde se encuentra el archivo subir.php
  $ruta = "../dist/img/".$_FILES['archivo']['name'];
  //comprobamos si este archivo existe para no volverlo a copiar.
  //pero si quieren pueden obviar esto si no es necesario.
  //o pueden darle otro nombre para que no sobreescriba el actual.

  if (!file_exists($ruta)){
  //aqui movemos el archivo desde la ruta temporal a nuestra ruta
  //usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
  //almacenara true o false

   if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta)){
    $archivo = $_FILES['archivo']['name'];
	   $id=$_GET['user'];
	 $eq = "UPDATE users SET usuario_avatar='$archivo' WHERE id='$id'";
$query_update = mysqli_query($conn,$eq)or die("Error en consulta <br>MySQL dice: ".mysql_error());   
   
	   //echo "<p align='center'>&nbsp;</p><p align='center'>$status</a>";
 echo "Imagen $archivo cambiada correctamente!!!.";
 echo "Vuelve a iniciar session para visualizar el cambio!!!.";	
	echo "<h2>Redireccionado... </h2>"; 
echo '<META HTTP-EQUIV=Refresh //CONTENT="1; URL=perfil.php">';
   } else {
    echo "ocurrio un error al mover el archivo.";
   }
  } else {
   echo $_FILES['archivo']['name'] . ", este archivo existe";
	  echo '<META HTTP-EQUIV=Refresh //CONTENT="0; URL=perfil.php">';
  }

}}
?>
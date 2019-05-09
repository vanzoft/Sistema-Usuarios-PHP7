

<? include($_SERVER['DOCUMENT_ROOT'].'/conn.php');
			
			// Connection variables
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$id = $_SESSION[Id];
			$result_fec = mysqli_query($conn, "SELECT * FROM logs WHERE Id_user = '$id' order by start DESC");
			$row_fec = mysqli_fetch_assoc($result_fec);
			$Fecha = $row_fec['start'];// Primero Definimos nuestras Variables
//$Fecha = date("Y-m-d H:i:s"); // Fecha Actual
		

$Sumar =  ($_SESSION['expire']-$_SESSION['start'])/60; // Cuantos minutos sumaremos

function sumarMinutosFecha($FechaStr, $MinASumar) {

$FechaStr = str_replace("-", " ", $FechaStr);
$FechaStr = str_replace(":", " ", $FechaStr);

$FechaOrigen = explode(" ", $FechaStr);

$Dia = $FechaOrigen[2];
$Mes = $FechaOrigen[1];
$Ano = $FechaOrigen[0];

$Horas = $FechaOrigen[3];
$Minutos = $FechaOrigen[4];
$Segundos = $FechaOrigen[5];

// Sumo los minutos
$Minutos = ((int)$Minutos) + ((int)$MinASumar);

// Asigno la fecha modificada a una nueva variable
$FechaNueva = date("Y-m-d H:i:s",mktime($Horas,$Minutos,$Segundos,$Mes,$Dia,$Ano));

return $FechaNueva;
}

/*echo ($_SESSION['expire']-$_SESSION['start'])/60; echo " Minutos"; */
?>



<span id='countdown'></span>




<script>

var end = new Date('<? echo sumarMinutosFecha($Fecha,$Sumar); ?>');
    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById('countdown').innerHTML = '<i class="fa fa-circle text-danger"> </i> Offline';
            
            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
      	var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);


        document.getElementById('countdown').innerHTML = '  <i class="fa fa-circle text-success"> </i> Online ';
       document.getElementById('count_down').innerHTML = minutes + '  minutes y ';
	  document.getElementById('count_down').innerHTML += seconds + ' segundos';
		
    }

    timer = setInterval(showRemaining, 1000);
</script>
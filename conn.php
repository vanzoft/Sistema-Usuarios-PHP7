<?php
// Connection variables
$dbhost	= "mariadb-004.wc1.phx1.stabletransit.com";	   // localhost or IP
$dbuser	= "556224_newphp";		  // database username
$dbpass	= "Iz*1256184";		     // database password
$dbname	= "556224_newphp";    // database name



  $con=@mysqli_connect('mariadb-004.wc1.phx1.stabletransit.com', '556224_newphp', 'Iz*1256184', '556224_newphp');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

?>
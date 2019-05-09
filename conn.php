<?php
// Connection variables
$dbhost	= " ";	   // localhost or IP
$dbuser	= " ";		  // database username
$dbpass	= " ";		     // database password
$dbname	= " ";    // database name



  $con=@mysqli_connect('$dbhost', '$dbuser', '$dbpass', '$dbname');
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

?>

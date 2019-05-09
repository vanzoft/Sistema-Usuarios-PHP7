<?php
session_start();
?>

 
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMINISTRACION | Web</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini" >

<div id="contenedor"></div>
<?php require("ssi/secure.php"); ?>
<div class="wrapper">
<?php include("ssi/head.php"); ?>
<?php include("ssi/sidebar.php"); ?>
 
  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Escritorio
        <small>Control panel</small>
      </h1>
    <?php include("ssi/breadcrumb.php"); ?>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
 
        <p></p>
		
		<?       //Enter your code here, enjoy!
echo " Gano | Empate | Perdio |</br>";
$marca = ["1", "x", "2"];

for ($i = 0; $i < 15; $i++) {
    
    $res = $marca[rand(0,2)];
    
    switch ($res) {
        
        case "1":
			
            echo "|  1  |    -   |    -   |</br>";
            break;
            
        case "x":
            echo "|  -  |    X   |    -   |</br>";
            break;
        
        case "2":
            echo "|  -  |    -   |    2   |</br>";
            break;
    }
}?>
		
		
		
 <P>CADUCIDAD</P><img src='../dist/img/loader.gif' width="5%">
	
		<HR>

       
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include("ssi/footer.php");
	
	 
	 ?>

</body>
</html>
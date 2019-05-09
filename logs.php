<?php
session_start();
?>

 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="<?php echo "http://".$_SERVER["HTTP_HOST"];?>/dist/img/logo_jinzai.png" type="image/png" />
<link rel="shortcut icon" href="<?php echo "http://".$_SERVER["HTTP_HOST"];?>/dist/img/logo_jinzai.png" type="image/png" />
<title>ADMIN | WEB </title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php require("ssi/secure.php"); ?>
<div class="wrapper">
<?php include("ssi/head.php"); ?>
<?php include("ssi/sidebar.php"); ?>
 
  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-user-secret"></i> Usuarios
        <small>Logs</small>
      </h1>
    <?php include("ssi/breadcrumb.php"); ?>
    </section>

   <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		   <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped display"  style="width:100%">
                <thead>
                <tr>
                

<th>Fecha</th>
<th>Nombre</th>					
                </tr>
                </thead>
                <tbody>
 <?php 
require("conn.php");

$query_logs = "SELECT id_logs, logs.email, start, nombre_usuario FROM logs INNER JOIN users ON logs.Id_user = users.Id ORDER BY `logs`.`start` DESC ";
			
$result_log = $con->query($query_logs);
/* array asociativo */
while($rowlog = $result_log->fetch_array()){ ?>
          <tr>   
				
              
             
              <td> <? 
									 
	$fecha = new DateTime($rowlog['start']);
$fecha = $fecha->format("d-m-Y h:i:s A");  
echo $fecha;

 ?></td>
             <td> <? echo strtoupper($rowlog['nombre_usuario']); ?></td>
			
					
		
			  </tr><?	} ?>
				
				
          
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
			</div></div></section>
    <!-- /.content -->
   </div>
  <!-- /.content-wrapper -->
 <?php include("ssi/footer.php"); ?>
	<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {

    $('#example2').DataTable({
      'paging'      	: true,
      'searching'   	: false,
      'ordering'    	: false,
      'info'        	: true,
      'autoWidth'   	: false,
	  "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]]
	  
    })
  })
</script>

</body>
</html>
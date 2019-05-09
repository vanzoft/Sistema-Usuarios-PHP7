<?php
session_start();
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Perfil | WEB</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php require("../ssi/secure.php"); ?>
<div class="wrapper">

  <?php include("../ssi/head.php"); ?>
<?php include("../ssi/sidebar.php"); ?>
  <div class="modal fade" id="modalfoto">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title">Cambio de foto</h2> Perfil de Usuario
              </div>
              <div class="modal-body">
				   <label for="archivo">Seleccionar imagen:</label>
				  
				  <div> 
	<a href="cambiar_foto.php?user=<?php echo $_SESSION['Id']; ?>&accion=existente&archivo=avatar.png">
	<img class="profile-user-img  img-circle" src="../../dist/img/avatar.png" alt="User profile picture"></a>
	<a href="cambiar_foto.php?user=<?php echo $_SESSION['Id']; ?>&accion=existente&archivo=avatar2.png">
	<img class="profile-user-img  img-circle" src="../../dist/img/avatar2.png" alt="User profile picture"></a>
	<a href="cambiar_foto.php?user=<?php echo $_SESSION['Id']; ?>&accion=existente&archivo=avatar3.png">
	<img class="profile-user-img img-circle" src="../../dist/img/avatar3.png" alt="User profile picture"></a>
	<a href="cambiar_foto.php?user=<?php echo $_SESSION['Id']; ?>&accion=existente&archivo=avatar4.png">
	<img class="profile-user-img  img-circle" src="../../dist/img/avatar4.png" alt="User profile picture"></a>
	<a href="cambiar_foto.php?user=<?php echo $_SESSION['Id']; ?>&accion=existente&archivo=avatar5.png">
	<img class="profile-user-img img-circle" src="../../dist/img/avatar5.png" alt="User profile picture"></a></div>
				  <p>&nbsp;</p>
               <form action="cambiar_foto.php?user=<?php echo $_SESSION['Id']; ?>" method="POST" enctype="multipart/form-data">
    <label for="archivo">Subir imagen:</label>
    <input type="file" name="archivo" id="archivo" />
    <input type="submit" name="subir" value="Subir Imagen"/>
</form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		  <h1>
		  <span class="glyphicon glyphicon-user"></span> Perfil de Usuario 
			<small>ACAT Mexicana</small>
		  </h1>
		   <?php include("../breadcrumb.php"); ?>
		</section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
             <div data-toggle="modal" data-target="#modalfoto"> <img class="profile-user-img img-responsive img-circle" src="../../dist/img/<?php echo $_SESSION['usuario_avatar']; ?>" alt="User profile picture"><a>Cambiar Foto</a></div>

              <h3 class="profile-username text-center"><?php echo $_SESSION['nombre_usuario']; ?></h3>

              <p class="text-muted text-center"> <i class="fa fa-circle text-success"></i> Online</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nick:</b> <a class="pull-right"><?php echo $_SESSION['name']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>E-mail:</b> <a class="pull-right"><?php echo $_SESSION['Email']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Registrado el:</b> <a class="pull-right"><?php echo $_SESSION['usuario_freg']; ?></a>
                </li>
              </ul>
<a href="logout.php" class="btn btn-primary btn-block">Cerrar Sesión</a>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Configuración</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i>Datos</strong>

              <p class="text-muted" style="margin-left: 20px">
				    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
               <span class="fa fa-unlock-alt"></span> Cambiar contraseña
              </button>
              
              </p>
				
 <?php if ($_SESSION['usuario_perfil'] == "1")
			 			 {
	 echo " <p class='text-muted' style='margin-left: 20px'><strong><a href='create-account.php'><span class='glyphicon glyphicon-pencil'></span> Registrar Usuarios</a></strong></p>";
	 echo " <p class='text-muted' style='margin-left: 20px'><strong><a href='cambiar_contrasena_users.php'><span class='glyphicon glyphicon-lock'></span> Cambiar contraseña Usuarios</a></strong></p>";
	 echo " <p class='text-muted' style='margin-left: 20px'><strong><a href='cambiar_permisos_users.php'><span class='glyphicon glyphicon-user'></span> Cambiar Permisos Usuarios</a></strong></p>";
	
 } ?>
              <hr>

            

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Nota</strong>

              <p>Si tiene algun problema contacte al administrador del sitio.</p>
				<p>contacto@vanzoft.com.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Chat</a></li>
            
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
         <?php include($_SERVER['DOCUMENT_ROOT'].'/usuarios/chat/index.php');; ?>

                <!-- Post --><!-- /.post -->
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
	    <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title">Cambio de contraseña</h2> Perfil de Usuario
              </div>
              <div class="modal-body">
                <?php 
				
				  
				 
				  include("cambiar_contrasena.php"); ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
	    
        <!-- /.modal -->
  </div>
  <!-- /.content-wrapper -->
 <?php include("../footer.php"); ?>
	<script>
  $(function () {
    $('#inventario').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
 
	 </body>
</html>

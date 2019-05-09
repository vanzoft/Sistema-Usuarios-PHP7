<?php
session_start();
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PERFIL | ACAT MEXICANA</title>
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
		<?php
    if (isset($_SESSION['loggedin'])) {  
    } else {
        echo "<div class='alert alert-danger' role='alert'>
        <h4>Necesitas estar logueado para accesar a esta pagina.</h4>
        <p><a href='../index.php'>Login!</a></p></div>";
        exit;
    }
    // checking the time now when check-login.php page starts
    $now = time();           
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "<div class='alert alert-danger' role='alert'>
        <h4>La session a expirado!</h4>
        <p><a href='../index.php'>Login Here</a></p></div>";
        exit;
        }


    ?>
<div class="wrapper">

  <?php include("../head.php"); ?>
<?php include("../sidebar.php"); ?>
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
	<a href="cambiar_foto.php?user=<?=$usuario_id?>&accion=existente&archivo=avatar2.png">
	<img class="profile-user-img  img-circle" src="../../dist/img/avatar2.png" alt="User profile picture"></a>
	<a href="cambiar_foto.php?user=<?=$usuario_id?>&accion=existente&archivo=avatar3.png">
	<img class="profile-user-img img-circle" src="../../dist/img/avatar3.png" alt="User profile picture"></a>
	<a href="cambiar_foto.php?user=<?=$usuario_id?>&accion=existente&archivo=avatar4.png">
	<img class="profile-user-img  img-circle" src="../../dist/img/avatar4.png" alt="User profile picture"></a>
	<a href="cambiar_foto.php?user=<?=$usuario_id?>&accion=existente&archivo=avatar5.png">
	<img class="profile-user-img img-circle" src="../../dist/img/avatar5.png" alt="User profile picture"></a></div>
				  <p>&nbsp;</p>
               <form action="cambiar_foto.php?user=<?=$usuario_id?>" method="POST" enctype="multipart/form-data">
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
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/<?php echo $_SESSION['usuario_avatar']; ?>" alt="User profile picture"><div data-toggle="modal" data-target="#modalfoto"><a>Cambiar Foto</a></div>

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
                  <b>Registrado el:</b> <a class="pull-right"><?php echo $_SESSION['usuario_freg'];?></a>
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
				
 <?php if ($usuario_perfil == "1")
			 			 {
				 echo " <p class='text-muted' style='margin-left: 20px'><strong><a href='cambiar_contrasena_users.php'><span class='glyphicon glyphicon-repeat'></span> Cambiar contraseña Usuarios</a></strong></p>";
 } ?>
              <hr>

            

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Nota</strong>

              <p>Si tiene algun problema contacte al administrador del sitio.</p>
				<p>sistemas@acatmexicana.com.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Comentarios</a></li>
            
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/default-50x50.gif" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/default-50x50.gif" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input class="form-control input-sm" placeholder="Response">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->

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
                <?php include("cambiar_contrasena.php"); ?>
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


<?$address = 'http://'.$_SERVER['HTTP_HOST'];?>

<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
<header class="main-header">
    <!-- Logo -->
    <a href="<?$address?>/inicio.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>ADMIN</b>Web</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ADMIN</b> Web</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
      
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/<?php echo $_SESSION['usuario_avatar']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Bienvenido <b><?php echo $_SESSION['nombre_usuario']; ?></b></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
         
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=$address?>/usuarios/perfil.php" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?=$address?>/logout.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>
         
       
        </ul>
      </div>
    </nav>
  </header>
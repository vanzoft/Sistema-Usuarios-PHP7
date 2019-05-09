  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/<?php echo $_SESSION['usuario_avatar']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nombre_usuario']; ?></p>
         <? include($_SERVER['DOCUMENT_ROOT'].'/ssi/hora.php');?>      </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
		    <li><a href="http://<?$host= $_SERVER["HTTP_HOST"];
echo $host;?>/inicio.php"><i class="fa fa-dashboard"></i> <span>Escritorio</span></a></li>
		   <?php  if ($_SESSION['usuario_perfil'] == "1") 
  { ?>
		   <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Administración</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="http://<?$host= $_SERVER["HTTP_HOST"];
echo $host;?>/acatweb/productos.php"><i class="fa fa-shopping-cart"></i> Productos</a></li>
            <li><a href="http://<?$host= $_SERVER["HTTP_HOST"];
echo $host;?>/acatweb/procesos.php"><i class="fa fa-gear"></i> Procesos</a></li>
            <li><a href="http://<?$host= $_SERVER["HTTP_HOST"];
echo $host;?>/acatweb/promociones.php"><i class="fa fa-star"></i> Promociones</a></li>
          </ul>
        </li> 
		 <? } ?>  
		  
		  
       		<li><a href="http://<?$host= $_SERVER["HTTP_HOST"];
echo $host;?>/catalogos/catalogos.php"><i class="fa fa-files-o"></i> <span>Catálogos</span></a></li>
     	    <li><a href="http://<?$host= $_SERVER["HTTP_HOST"];
echo $host;?>/inventario/inventario.php"><i class="fa fa-laptop"></i> <span>Inventario</span></a></li>
       
       
        <li class="header">Links</li>
        <li><a href="#/"><i class="fa fa-circle-o text-red"></i> <span>Link</span></a></li>
        <li><a href="mailto:ivan.zarate@vanzoft.com"><i class="fa fa-circle-o text-yellow"></i> <span>Soporte</span></a></li>
      <?php  if ($_SESSION['usuario_perfil'] == "1") { ?> 
		  <li><a href="http://<?$host= $_SERVER["HTTP_HOST"];
echo $host;?>/logs.php"><i class="fa fa-user-secret"></i> <span>Logs</span></a></li><? }?>	
     
		
	
		
		
		
		
		</ul>
    </section>
	 
    <!-- /.sidebar -->
  </aside>
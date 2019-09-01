<?php

	//pagina en la que actualmente se encuentra
	$archivo1 = basename($_SERVER['PHP_SELF']);


	//lista de las páginas del menú inicio
	$menu_inicio = array("home.php");
	

	//condicional para el menú inicio verfifica si está en el menú inicio
	if (in_array($archivo1, $menu_inicio)) {
		$active_inicio="class=\"active\"";
	}
	

	//lista de las pàginas del menù clientes
	$menu_cliente= array("clientes.php", "agregar_cliente.php", "editar_cliente.php");

	//condicional para el menú de los clientes verfifica si está en el menú clientes
	if (in_array($archivo1, $menu_cliente)) {
		$active_cliente="class=\"active\"";
	}


	//lista de las páginas del menú proveedores
	$menu_proveedor = array("proveedores.php", "agregar_proveedor.php", "editar_proveedor.php", "pedidos.php", "agregar_pedido.php", "editar_pedido.php", "reporte_pedidos.php");
	

	//condicional para el menú del proveedor verfifica si está en el menú proveedor
	if (in_array($archivo1, $menu_proveedor)) {
		$active_proveedor="class=\"active\"";
	}

	//lista de las páginas del menú proveedores
	$menu_entradas = array("entradas.php", "agregar_entrada.php", "reporte_entrada.php","editar_entrada.php");
	

	//condicional para el menú del proveedor verfifica si está en el menú proveedor
	if (in_array($archivo1, $menu_entradas)) {
		$active_entradas="class=\"active\"";
	}
	$menu_usuarios = array("usuarios.php", "editar_usuario.php", "agregar_usuario.php");
	

	//condicional para el menú del proveedor verfifica si está en el menú proveedor
	if (in_array($archivo1, $menu_usuarios)) {
		$active_usuarios="class=\"active\"";
	}
$menu_configuracion = array("configuracion.php", "agregar_configuracion.php", "editar_configuracion.php");
	

	//condicional para el menú del proveedor verfifica si está en el menú proveedor
	if (in_array($archivo1, $menu_configuracion)) {
		$active_configuracion="class=\"active\"";
	}
?>
		

<link href="public/css/cssmenulateral/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="public/js/jsmenulateral/bootstrap.min.js"></script>
<script src="public/js/jsmenulateral/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<link href="public/css/estilos css.css" rel="stylesheet" >
<script src="public/js/funcionalidad javascript.js"></script>

<nav class="navbar navbar-inverse sidebar" role="navigation">
    <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#" style="color:orange";>MENU LATERAL</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li <?php echo @$active_inicio;?>><a href="<?php echo Conectar::ruta();?>home.php">INICIO<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
				<li <?php echo @$active_cliente;?>><a href="<?php echo Conectar::ruta();?>clientes.php" style="color:#FF0000";>VENTAS<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-lock"></span></a></li>
				<li <?php echo @$active_proveedor;?>><a href="<?php echo Conectar::ruta();?>proveedores.php">PROVEEDORES<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<li <?php  echo @$active_entradas; ?>>
					<a href="<?php echo Conectar::ruta();?>entradas.php" class="" >PRODUCTOS <span class=""></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-shopping-cart"></span></a>
				<!--	data-toggle="dropdown" dropdowndropdown-toggle<ul class="dropdown-menu forAnimate" role="menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li class="divider"></li>
						<li><a href="#">Separated link</a></li>
						<li class="divider"></li>
						<li><a href="#">One more separated link</a></li>
					</ul>-->
				</li>
				<li <?php if($archivo1=="almacen.php"){ echo "class=\"active\"";};?>><a href="<?php echo Conectar::ruta();?>almacen.php" style="color:#FF0000";>ALMACEN<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tasks"></span></a></li>
				<li <?php if($archivo1=="ventas.php"){ echo "class=\"active\"";};?>><a href="<?php echo Conectar::ruta();?>ventas.php" style="color:#FF0000";>VENTAS<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-lock"></span></a></li>

				<?php 
				//muestra la opción de usuarios si es administrador

				if ($_SESSION["rol"]==1){
				?>
				<li <?php echo @$active_usuarios; ?>><a href="usuarios.php">USUARIOS<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<?php } ?>

				<li <?php if($archivo1=="basedatos.php"){ echo "class=\"active\"";};?>><a href="<?php echo Conectar::ruta();?>basedatos.php" style="color:#FF0000";>BASE DATOS<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>
				<li <?php echo @$active_configuracion; ?>><a href="<?php echo Conectar::ruta();?>configuracion.php" style="color:#FF0000";>CONFIGURACION<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-wrench"></span></a></li>
				<li class=""><a href="logout.php">CERRAR SESION<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-off"></span></a></li>
				
			</ul>
		</div>
	</div>
</nav>
<div class="main">
<!-- Content Here -->
</div>
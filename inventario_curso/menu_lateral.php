<?php
	$archivo1 = basename($_SERVER['PHP_SELF']);

	$menu_proveedor = array("proveedores.php", "agregar_proveedor.php", "editar_proveedor.php");
?>
		
		
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
			<a class="navbar-brand" href="#">Brand</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li <?php if($archivo1=="home.php"){ echo "class=\"active\"";};?>><a href="<?php echo Conectar::ruta();?>home.php">INICIO<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
				<li <?php if($archivo1=="clientes.php" or $archivo1=="agregar_cliente.php" or $archivo1=="editar_cliente.php"){ echo "class=\"active\"";};?>><a href="<?php echo Conectar::ruta();?>clientes.php">CLIENTES<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<li <?php if($archivo1=="proveedores.php" or $archivo1=="agregar_proveedor.php" or $archivo1=="editar_proveedor.php" or $archivo1=="pedidos.php" or $archivo1=="agregar_pedido.php" or $archivo1=="editar_pedido.php" or $archivo1=="reporte_pedidos.php"){ echo "class=\"active\"";};?>><a href="<?php echo Conectar::ruta();?>proveedores.php">PROVEEDORES<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<li <?php if($archivo1=="entradas.php"){ echo "class=\"active\"";};?>>
					<a href="<?php echo Conectar::ruta();?>entradas.php" class="" >ENTRADAS <span class=""></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-shopping-cart"></span></a>
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
				<li <?php if($archivo1=="almacen.php"){ echo "class=\"active\"";};?>><a href="<?php echo Conectar::ruta();?>almacen.php">ALMACEN<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tasks"></span></a></li>
				<li <?php if($archivo1=="ventas.php"){ echo "class=\"active\"";};?>><a href="<?php echo Conectar::ruta();?>ventas.php">VENTAS<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-lock"></span></a></li>
				<li <?php if($archivo1=="usuarios.php"){ echo "class=\"active\"";};?>><a href="usuarios.php">USUARIOS<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
				<li <?php if($archivo1=="basedatos.php"){ echo "class=\"active\"";};?>><a href="<?php echo Conectar::ruta();?>basedatos.php">BASE DATOS<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>
				<li <?php if($archivo1=="configuracion.php"){ echo "class=\"active\"";};?>><a href="<?php echo Conectar::ruta();?>configuracion.php">CONFIGURACION<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-wrench"></span></a></li>
				<li class=""><a href="logout.php">CERRAR SESION<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-off"></span></a></li>
				
			</ul>
		</div>
	</div>
</nav>
<div class="main">
<!-- Content Here -->
</div>
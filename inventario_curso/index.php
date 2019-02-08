<?php

require_once("class/config.php");

require_once("class/userModulo.php");

$usuario= new Usuarios();

 if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){

    $usuario->login();
    exit();
 }

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="public/css/estilos formulario.css" type="text/css">
<link rel="stylesheet" href="public/css/style.css" type="text/css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">


<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php //require_once("head.php");?>
</head>
	<body class="pagina_index">		
		<h1 align="center">SISTEMA DE CONTROL DE INVENTARIO VARIEDADES YEYIS CASTILLO </h1>			    
		<div align="center"><img src="public/images/logo sena.gif" height="150"></div>
		<form method="post" action="">
		
			<!--formulario inicio de sesion-->
			
			<div class='login'>
				<h2 class= "white">INICIO</h2>
				
				<div>
				<input name='usuario' placeholder='USUARIO' type='text'/>
				</div>
				<div class="input-group">
					<input id='pw' name='password' placeholder='CONTRASEÑA' type='password'/>
					<span id="show-hide-passwd" action="hide" class="input-group-addon glyphicon glyphicon glyphicon-eye-open"></span>
					
				</div>
				
				<br />
	
			 
			    <div> 
				<input type='submit' value='ENTRAR'/>
				</div>
				
			</div>    
			<input type="hidden" name="grabar" value="si">
		</form>
	</body>
	<script class="cssdeck" src="public/js/jquery-1.11.2.min.js"></script>
	<script class="cssdeck" src="public/js/javascript formulario.js"></script>
</html>
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

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php //require_once("head.php");?>
</head>
	<body class="pagina_index">		
		<h1 align="center">SISTEMA DE CONTROL DE INVENTARIO VARIEDADES YEYIS CASTILLO </h1>			    
		<div align="center"><img src="public/images/logo sena.gif" height="150"></div>
		<form method="post" action="">	
			<div class='login'>
				<h2>INICIO</h2>
				<input name='usuario' placeholder='USUARIO' type='text'/>
				<input id='pw' name='password' placeholder='CONTRASEÑA' type='password'/>
				<div class='remember'>
					<input checked='' id='remember' name='remember' type='checkbox'/>
					<label for='remember'></label> RECORDARME
				</div>
				<input type='submit' value='ENTRAR'/>
				<a class='forgot' href='#'>OLVIDO SU CONTRASEÑA?</a>
			</div>    
			<input type="hidden" name="grabar" value="si">
		</form>
	</body>
	<script class="cssdeck" src="public/js/jquery-1.11.2.min.js"></script>
	<script class="cssdeck" src="public/js/javascript formulario.js"></script>
</html>
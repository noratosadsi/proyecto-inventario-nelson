<?php

 require_once("class/config.php");

  if(isset($_SESSION["backend_id"])){

    if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
       
       require_once("class/clientesModulo.php");

       $usuario=new Clientes();

       $usuario->agregar_cliente();
       exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php require_once("head.php");?>
</head>
<body>

	<div class="container-fluid">
		
		<?php require_once("menu_principal.php");?>

		<div class="container-fluid">
			
			<div class="row">
				<div class="col-sm-1">
					
					<?php require_once("menu_lateral.php");?>
				</div>

				<div class="col-sm-11">

					<div class="panel-cliente">
						<ol class="breadcrumb">
						  <li><a href="<?php echo Conectar::ruta();?>home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Principal</a></li>
						  <li><a href="<?php echo Conectar::ruta();?>clientes.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> CLIENTES</a></li>
						  <li><a href="<?php echo Conectar::ruta();?>agregar_cliente.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>AGREGAR CLIENTE</a></li>
						</ol>
					</div>

					<?php 

                       if(isset($_GET["m"])){
                         
                         switch($_GET["m"]){

                           case "1";
                           ?>
                           <h2>Los campos estan vacios</h2>
                           <?php
                           break;

                           case "2";
                           ?>
                           <h2>el cliente se ha agregado</h2>
                           <?php
                           break;
                         }
                       }
					?>

					<div class="panel panel-default">
						 
						 <div class="panel-heading">
						 	<h3 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> REGISTRO DE CLIENTES</h3>
						 </div>

						 <div class="panel-body">
						 	 <form action="" method="post" class="form-horizontal">
						
						   <div class="form-group">
							<label for="" class="col-sm-2 control-label">CEDULA</label>
							<div class="col-sm-6">
								<input type="text" name="cedula" class="form-control" placeholder="ingrese cedula">
							</div>
						    </div>
						                           
                           <div class="form-group">
							<label for="" class="col-sm-2 control-label">NOMBRE</label>
							<div class="col-sm-6">
								<input type="text" name="nombre" class="form-control" placeholder="ingrese nombre">
							</div>
						    </div>

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">TELEFONO</label>
							<div class="col-sm-6">
								<input type="text" name="telefono" class="form-control" placeholder="ingrese telefono">
							</div>
							</div>

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">DIRECCION</label>
							<div class="col-sm-6">
								<input type="text" name="direccion" class="form-control" placeholder="ingrese direccion">
							</div>
							</div>

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">CORREO</label>
							<div class="col-sm-6">
								<input type="text" name="correo" class="form-control" placeholder="ingrese correo">
							</div>
							</div>

							
							<input type="hidden" name="grabar" value="si">

							<button class="btn btn-default col-sm-offset-2">REGISTRAR</button>
                          
                          </form>
						</div><!--panel-body-->
					    
						 </div>
					</div>

					
				</div><!--col-sm-8-->
			</div><!--row-->
		</div><!--container-fluid-->
	</div>

	<?php //require_once("footer.php");?>
	
</body>
</html>

<?php } else {

	header("Location:".Conectar::ruta()."index.php");
}?>
<?php

 require_once("class/config.php");

  if(isset($_SESSION["backend_id"])){

	  //ver los clientes
  	  require_once("class/clientesModulo.php");
      $clientes=new Clientes();
      $cliente=$clientes->get_clientes();

	  //ver las ventas	
	  require_once("class/ventasModulo.php");
	  $venta=new Ventas();
      //$datos=$venta->get_ventas();

	  //ver los productos
	
	  require_once("class/entradasModulo.php");
	  $productos=new Entradas();
	  $producto=$productos->get_entradas();

	   if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
			
			$venta->agregar_venta();
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
						  <li><a href="<?php echo Conectar::ruta();?>ventas.php"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> VENTAS</a></li>
						  <li><a href="<?php echo Conectar::ruta();?>agregar_venta.php"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>AGREGAR VENTAS</a></li>
						   <li><a href="<?php echo Conectar::ruta();?>PDF.PHP"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> LISTADO VENTAS PDF</a></li>
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
                           <h2>la venta se ha agregado</h2>
                           <?php
                           break;
                         }
                       }
					?>

					<div class="panel panel-default">
						 
						 <div class="panel-heading">
						 	<h3 class="panel-title"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> REGISTRO DE VENTAS</h3>
						 </div>

						 <div class="panel-body">
						 	 <form action="" method="post" class="form-horizontal">
						
						   <div class="form-group">
							<label for="" class="col-sm-2 control-label">VENTA PRODUCTO</label>
							<div class="col-sm-6">
								<select name="producto" class="form-control" id="lista_productos">
									
								</select>
							</div>
						    </div>
					       
					       <div class="form-group">
							<label for="" class="col-sm-2 control-label">DESCRIPCION</label>
							<div class="col-sm-6">
								<input type="text" name="descripcion" class="form-control" placeholder="ingrese descripcion">
							</div>
						    </div>
						                           
                           <div class="form-group">
							<label for="" class="col-sm-2 control-label">CANTIDAD</label>
							<div class="col-sm-6">
								<!--<input type="text" name="cantidad" class="form-control" placeholder="ingrese cantidad">-->
								<select name="cantidad" class="form-control" id="cantidades">
								
								</select>
							</div>
						    </div>

							<!--
							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">DESCRIPCION</label>
							<div class="col-sm-6">
								<input type="text" name="descripcion" class="form-control" placeholder="ingrese descripcion">
							</div>
							</div>
							-->

							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">PRECIO</label>
							<div class="col-sm-6">
								<input type="text" name="precio" class="form-control" placeholder="ingrese precio">
							</div>
							</div>

							<div class="form-group">
								<label for="" class="col-sm-2 control-label">CLIENTE</label>
									<div class="col-sm-6">
										<select name="cliente" class="form-control">
											<option value="0">SELECCIONAR</option>
													  				 	  	     	 	 <?php
                                                for($i=0; $i<sizeof($cliente);$i++){
                                                    
                                                    ?>
                                                     <option value="<?php echo $cliente[$i]["idclientes"];?>"><?php echo $cliente[$i]["nombre"];?></option>
                                                    <?php
                                                }
		  				 	  	     	 	 ?>
										</select>

									</div>
							</div>

							<!--
							 <div class="form-group">
							<label for="" class="col-sm-2 control-label">PRECIO TOTAL</label>
							<div class="col-sm-6">
								<input type="text" name="preciototal" class="form-control" placeholder="ingrese total">
							</div>
							</div>
							-->
							
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
	<script type="text/javascript" src="public/js/index.js"></script>
</body>
</html>

<?php } else {

	header("Location:".Conectar::ruta()."index.php");
}?>
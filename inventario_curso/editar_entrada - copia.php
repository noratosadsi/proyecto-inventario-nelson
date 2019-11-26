<?php
	//error_reporting(E_ERROR | E_WARNING | E_PARSE);
 require_once("class/config.php");

   require_once("class/proveedoresModulo.php");

   require_once("class/entradasModulo.php");

   $proveedores=new Proveedores();

   $entrada=new Entradas();

   $proveedor=$proveedores->get_proveedores();

   $datos=$entrada->get_entrada_por_id($_GET["idproductos"]);

   if(isset($_SESSION["backend_id"])){

    if(isset($_POST["grabar"]) and $_POST["grabar"]=="si"){
     
       require_once("class/entradasModulo.php");

       $entrada=new Entradas();

       $entrada->editar_entrada();
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
    <body bgcolor="red">
    <div class="container fluid">
    	 
    	<?php require_once("menu_principal.php");?>


    	  <div class="container-fluid">
    	  	  
    	  	  <div class="row">
    	  	  	  <div class="col-sm-1">
    	  	  	  	  
    	  	  	  	  <?php require_once("menu_lateral.php");?>
    	  	  	  </div>

    	  	  	  <div class="col-sm-11">
    	  	  	  	   
    	  	  	  	    <div class="panel-entrada">
		  	 		 	 <ol class="breadcrumb">
							  <li><a href="<?php echo Conectar::ruta();?>home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Principal</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>entradas.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Productos</a></li>
							  <li><a href="<?php echo Conectar::ruta();?>agregar_entrada.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Nuevo Producto</a></li>
							  <li><a href="<?php echo Conectar::ruta()?>reporte_entrada.php"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Orden de Productos</a></li>
							 
						</ol>
		  	 		 </div>

		  	 		 <?php
                     
                     if(isset($_GET["m"])){
                       
                       switch($_GET["m"]) {
                        
                        case "1";
                        ?>
                        <h2>los campos estan vacios</h2>
                        <?php 
                        break;

                         case "2";
                        ?>
                        <h2>se ha editado la entrada</h2>
                        <?php 
                        break;

                      }
                     }

		  	 		 ?>

		  	 		 <div class="panel panel-default" bgcolor="red">
		  	 		 	  
		  	 		 	  <div class="panel-heading">
		  	 		 	  	 <h3 class="panel-title"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar Producto</h3>
		  	 		 	  </div>

		  	 		 	  <div class="panel-body">
		  	 		 	  	  
		  	 		 	  	  <form action="" class="form-horizontal" method="post">
		  	 		 	  	  	
                                 <div class="form-group">
                                 	<label for="" class="col-sm-2 control-label">Código Producto</label>
                                    <div class="col-sm-6">
                                     <input type="text" name="idproductos" class="form-control" placeholder="codigo producto" value="<?php echo $datos[0]["idproductos"];?>">
                                    </div>
                                 </div>
                                    
                                 <div class="form-group">
                                 	<label for="" class="col-sm-2 control-label">Nombre Producto</label>
                                    <div class="col-sm-6">
                                     <input type="text" name="nombre" class="form-control" placeholder="codigo producto" value="<?php echo $datos[0]["nombre"];?>">
                                    </div>
                                 </div>

                                 <div class="form-group">
                                 	<label for="" class="col-sm-2 control-label">Descripción Producto</label>
                                    <div class="col-sm-6">
                                     <input type="text" name="descripcion" class="form-control" placeholder="descripcion producto" value="<?php echo $datos[0]["descripcion"];?>">
                                    </div>
                                 </div>

                                 <div class="form-group">
                                 	<label for="" class="col-sm-2 control-label">Precio Producto</label>
                                    <div class="col-sm-6">
                                     <input type="text" name="precio" class="form-control" placeholder="precio producto" value="<?php echo $datos[0]["precio"];?>">
                                    </div>
                                 </div>

                                  <div class="form-group">
                                 	<label for="" class="col-sm-2 control-label">Cantidad Producto</label>
                                    <div class="col-sm-6">
                                     <input type="text" name="cantidad" class="form-control" placeholder="cantidad producto" value="<?php echo $datos[0]["cantidad"];?>">
                                    </div>
                                 </div>

                                 <div class="form-group">
                                 	<label for="" class="col-sm-2 control-label">Proveedor Producto</label>
                                    <div class="col-sm-6">
                                       <select name="idproveedor" class="form-control" id="">
                                       	
                                       	<option value="0">SELECCIONE</option>

                                           <?php
                                             
                                             for($i=0;$i<sizeof($proveedor);$i++){


                                        if($datos[0]["proveedores_idproveedor"]==$proveedor[$i]["idproveedor"]){
                                                 
                                                 ?>
                                                <option value="<?php echo $proveedor[$i]["idproveedor"];?>" selected="selected"><?php echo $proveedor[$i]["nombre_proveedor"];?></option>
                                                 <?php
                                          } else{

                                             ?>
                                                <option value="<?php echo $proveedor[$i]["idproveedor"];?>" ><?php echo $proveedor[$i]["nombre_proveedor"];?></option>
                                                 <?php 
                                          }


                                             }

                                           ?>
                                       </select>
                                    </div>
                                 </div>

                                 <input type="hidden" name="grabar" value="si">

                                 <input type="hidden" name="id" value="<?php echo $_GET["idproductos"];?>">

                                 <button type="submit" class="btn btn-default col-sm-offset-2">REGISTRAR</button>

		  	 		 	  	  </form>
		  	 		 	  </div>
		  	 		 </div>
    	  	  	  </div>
    	  	  </div>
    	  </div>
    </div>

	  <?php //require_once("footer.php");?>
</body>
</html>

<?php } else {

	 header("Location:".Conectar::ruta()."index.php");
}?>
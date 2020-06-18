<?php

 class Proveedores extends Conectar{


 	  public function get_proveedores(){

 	  	  $conectar=parent::conexion();
 	  	  parent::set_names();

 	  	  $sql="select * from proveedores;";
		  
 	  	  $sql=$conectar->prepare($sql);

 	  	  $sql->execute();

 	  	  return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
 	  }

 	  public function agregar_proveedor(){

 	  	$conectar=parent::conexion();
 	  	parent::set_names();

 	  	if(empty($_POST["rif_proveedor"]) or empty($_POST["nombre_proveedor"]) or empty($_POST["tlf_proveedor"]) or empty($_POST["direc_proveedor"]) or empty($_POST["email_proveedor"]) or empty($_POST["nom_contacto"])){
           
           header("Location:".Conectar::ruta()."agregar_proveedor.php?m=1");
           exit();
 	  	}

 	  	$sql="insert into proveedores 
 	  	values(null,?,?,?,?,?,?);";

 	  	$sql=$conectar->prepare($sql);

 	  	$sql->bindValue(1,$_POST["rif_proveedor"]);
 	  	$sql->bindValue(2,$_POST["nombre_proveedor"]);
 	  	$sql->bindValue(3,$_POST["tlf_proveedor"]);
 	  	$sql->bindValue(4,$_POST["direc_proveedor"]);
        $sql->bindValue(5,$_POST["email_proveedor"]);
        $sql->bindValue(6,$_POST["nom_contacto"]);
        $sql->execute();

        $resultado=$sql->fetch(PDO::FETCH_ASSOC);
		//var_dump($sql->errorInfo());
        header("Location:".Conectar::ruta()."agregar_proveedor.php?m=2");
        exit();
 	  }

 	  public function get_proveedor_por_id($id_proveedor){

 	  	   $conectar=parent::conexion();
 	  	   parent::set_names();

           $sql="select * from proveedores where idproveedor=?";

           $sql=$conectar->prepare($sql);

           $sql->bindValue(1,$id_proveedor);

           $sql->execute();

           return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
 	  }

 	  public function editar_proveedor(){

 	  	 $conectar=parent::conexion();
 	  	 parent::set_names();

 	  	  if(empty($_POST["rif_proveedor"]) or empty($_POST["nombre_proveedor"]) or empty($_POST["tlf_proveedor"]) or empty($_POST["direc_proveedor"]) or empty($_POST["email_proveedor"]) or empty($_POST["nom_contacto"])){
           
           header("Location:".Conectar::ruta()."editar_proveedor.php?id_proveedor=".$_POST["id"]."&m=1");
           exit();
 	  	}

 	  	$sql="update proveedores set 
        
        Nit_proveedor=?,
        nombre_proveedor=?,
        tlf_proveedor=?,
        direc_proveedor=?,
        email_proveedor=?,
        nom_contacto=?
        where 
        idproveedor=?
         ";

         $sql=$conectar->prepare($sql);

         $sql->bindValue(1,$_POST["rif_proveedor"]);
         $sql->bindValue(2,$_POST["nombre_proveedor"]);
         $sql->bindValue(3,$_POST["tlf_proveedor"]);
         $sql->bindValue(4,$_POST["direc_proveedor"]);
         $sql->bindValue(5,$_POST["email_proveedor"]);
         $sql->bindValue(6,$_POST["nom_contacto"]);
         $sql->bindValue(7,$_POST["id"]);
         $sql->execute();

         $resultado=$sql->fetch(PDO::FETCH_ASSOC);

         header("Location:".Conectar::ruta()."editar_proveedor.php?id_proveedor=".$_POST["id"]."&m=2");
         exit();
 	  }

//no se puede eliminar los proveedores que tienen productos asociados a ellos

 	  public function eliminar_proveedor($id_proveedor){

 	  	  $conectar=parent::conexion();
 	  	  parent::set_names();

 	  	  $sql="delete from proveedores where idproveedor=?";

 	  	  $sql=$conectar->prepare($sql);

 	  	  $sql->bindValue(1,$id_proveedor);
             $sql->execute();
             
       

 	  	  return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
 	  }

    public function get_pedidos(){

       $conectar=parent::conexion();
       parent::set_names();

       $sql="select * from pedidos inner join proveedores on proveedores_idproveedor=idproveedor inner join orden_compras on orden_compras_id_orden_compras=id_orden_compras;";

       $sql=$conectar->prepare($sql);

       $sql->execute();

       return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

	//agregar orden de compras
	
	public function agregar_orden(){
				
		$conectar=parent::conexion();
        parent::set_names();

	    echo $idorden=$item["id_orden_compras"]." este es el id de la orden de compras";	
		
		 if(empty($_POST["precio_pedido"]) or empty($_POST["producto"])){
            
            header("Location:".Conectar::ruta()."agregar_pedido.php?m=1");
            exit();
        }
		
		$sql="insert into orden_compras 
        values(null,?,?);";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["precio_pedido"]);
        $sql->bindValue(2, $_POST["producto"]);
        $sql->execute();

        $resultado=$sql->fetch(PDO::FETCH_ASSOC);
		
		/*echo $_POST["producto"]." producto ".$_POST["proveedor"]." proveedor ". $_POST["cantidad_pedido"]." ". $_POST["pedido_producto"]." ".$_POST["pedido_descripcion"];*/
		
	}
	
	//selecciona la tabla orden compras
	
	  public function get_orden(){

       $conectar=parent::conexion();
       parent::set_names();

       $sql="select * from orden_compras where productos_idproductos=?;";

       $sql=$conectar->prepare($sql);

	   $sql->bindValue(1, $_POST["producto"]);
	   
       $sql->execute();

       $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
	   
	   //echo $resultado["productos_idproductos"];
	   
	   foreach($resultado as $item){
		   
		   echo $item["productos_idproductos"];
		   echo "<br>";
		   
		   }
	   $idproducto=$item["productos_idproductos"];	
	  
	   
	  // echo "productos $idproducto";
	  /* 
	  // echo "<script>alert('mostrar $resultado')</script>;";
	   
	  // echo $resultado;
	   //echo "<br>";
	  // echo var_dump($resultado, true);
	   //echo "<br>";
	  // implode( ", ", $list );*/
    }
	
	//echo $idproducto;
    public function agregar_pedido(){

        $conectar=parent::conexion();
        parent::set_names();  
		
	   $sql="select * from orden_compras inner join productos on productos_idproductos=idproductos where productos_idproductos=?;";

       $sql=$conectar->prepare($sql);

	   $sql->bindValue(1, $_POST["producto"]);
	   
       $sql->execute();

       $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		
	    foreach($resultado as $item){
		   
		   $item["productos_idproductos"];
		   //echo "<br>";
		   
		   }
	   echo $idorden=$item["id_orden_compras"]." este es el id de la orden de compras";	
	   $producto=$item["nombre"];	

        if(empty($_POST["pedido_descripcion"]) or empty($_POST["cantidad_pedido"]) or empty($_POST["producto"])){
            
            header("Location:".Conectar::ruta()."agregar_pedido.php?m=1");
            exit();
        }	
		
		//inserta en la tabla pedidos el id de orden compras

		
     /*   $sql="insert into pedidos left join orden_compras on orden_id_orden_compras=id_orden_compras(idpedido, cantidad_pedido, fecha_pedido, usuarios_id, proveedores_idproveedor, orden_id_orden_compras, producto_pedido, descripcion_pedido)
        values(null,?,now(),2,?,?,?,?);";*/
		
		
		$sql="insert into pedidos
        values(null,?,now(),?,?,?,?,?);";
		
		
		
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["cantidad_pedido"]);
        $sql->bindValue(2, $_SESSION["backend_id"]);
        $sql->bindValue(3, $_POST["proveedor"]);
        $sql->bindValue(4, $idorden);
        $sql->bindValue(5, $producto);
        $sql->bindValue(6, $_POST["pedido_descripcion"]);
        $sql->execute();

        $resultado=$sql->fetch(PDO::FETCH_ASSOC);
		
		/*foreach($w as $item){
			
			echo $item["productos_idproductos"];
			}*/

        header("Location:".Conectar::ruta()."agregar_pedido.php?m=2");
		
		//print_r($sql->errorInfo());
        exit();
    }

    public function get_pedido_por_id($id_pedido){


         $conectar=parent::conexion();
         parent::set_names();

         $sql="select * from pedidos inner join orden_compras on orden_compras_id_orden_compras=id_orden_compras
		 where idpedido=?";

         $sql=$conectar->prepare($sql);

         $sql->bindValue(1,$id_pedido);

         $sql->execute();

         return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function editar_pedido(){



        $conectar=parent::conexion();
        parent::set_names();


		$sql="select * from productos where idproductos=?;";

		$sql=$conectar->prepare($sql);

		$sql->bindValue(1, $_POST["cod_material"]);
	   
		$sql->execute();

		$resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
		
	    foreach($resultado as $item){
		   
		   $item["idproductos"];
		   //echo "<br>";
		   
		   }
		
		$producto=$item["nombre"];

        if(empty($_POST["cod_material"]) or empty($_POST["material_pedido"]) or empty($_POST["cantidad_pedido"]) or empty($_POST["proveedor"])){
            
            header("Location:".Conectar::ruta()."editar_pedido.php?id_pedido=".$_POST["id"]."&m=1");
            exit();
        }

        $sql="update pedidos INNER JOIN orden_compras ON (orden_compras_id_orden_compras = id_orden_compras) 
		set  

          productos_idproductos=?,
          producto_pedido=?,
          cantidad_pedido=?,
          fecha_pedido=now(),
          proveedores_idproveedor=?,
		  descripcion_pedido=?
          where 
          idpedido=?

        ";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1, $_POST["cod_material"]);
        $sql->bindValue(2, $producto);
        $sql->bindValue(3, $_POST["cantidad_pedido"]);
		$sql->bindValue(4, $_POST["proveedor"]);
		$sql->bindValue(5, $_POST["material_pedido"]);
        $sql->bindValue(6, $_POST["id"]);
        $sql->execute();

        $resultado=$sql->fetch(PDO::FETCH_ASSOC);
		
        header("Location:".Conectar::ruta()."editar_pedido.php?id_pedido=".$_POST["id"]."&m=2");

		//print_r($sql->errorInfo());

		echo "</br> el producto seleccionado es $producto";
        exit();
    }

    public function eliminar_pedido($id_pedido){

       $conectar=parent::conexion();
       parent::set_names();

        $sql="delete from pedidos where idpedido=?;";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$id_pedido);

        $sql->execute();

        return $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        print_r($sql->errorInfo());
        
        
    }

    public function get_proveedores_por_rif(){

        $conectar=parent::conexion();
        parent::set_names();

        $sql="select * from proveedores where idproveedor=?";

        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$_POST["idproveedor"]);

        $sql->execute();

        return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
    }


    public function get_pedido_por_fecha(){

        $conectar=parent::conexion();
        parent::set_names();

        $dia= $_POST["dia"];
        $mes= $_POST["mes"];
        $ano= $_POST["ano"];

        $dia1= $_POST["dia1"];
        $mes1= $_POST["mes1"];
        $ano1= $_POST["ano1"];

        $fecha_desde= ($ano."-".$mes."-".$dia);
        $fecha_hasta= ($ano1."-".$mes1."-".$dia1);

        $sql="select * from pedidos where proveedores_idproveedor=? and fecha_pedido>=? and fecha_pedido<=?;";
    
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$_POST["idproveedor"]);
        $sql->bindValue(2,$fecha_desde);
        $sql->bindValue(3,$fecha_hasta);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //se usó para llamar al nombre del proveedor en reporte de materiales en pdf
  public function get_proveedor_por_rif_directo($proveedor){

    $conectar=parent::conexion();
    parent::set_names();

    $sql="select * from proveedores where rif_proveedor=?;";

    $sql=$conectar->prepare($sql);

    $sql->bindValue(1,$proveedor);
    $sql->execute();
    return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
  }

 }



?>
<?php

  class Entradas extends Conectar{


  	  public function get_entradas(){


  	  	 $conectar=parent::conexion();
  	  	 parent::set_names();

  	  	 $sql="select * from productos inner join proveedores on productos.proveedores_idproveedor=
		 proveedores.idproveedor;";

  	  	 $sql=$conectar->prepare($sql);

  	  	 $sql->execute();

  	  	 return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  	  }

  	  public function agregar_entrada(){

  	  	  $conectar=parent::conexion();
  	  	  parent::set_names();

  	  	  if(empty/*($_POST["idproducto"])or empty*/ ($_POST["nombre"]) or empty($_POST["descripcion"]) or empty($_POST["precio"]) or empty($_POST["cantidad"]) or empty($_POST["idproveedor"])){
             
             header("Location:".Conectar::ruta()."agregar_entrada.php?m=1");
             exit();
  	  	  }

  	  	/*  $sql="insert into productos (idproductos, nombre, precio, cantidad, descripcion, fecha, usuarios_id, 
proveedores_idproveedor) values(null,?,?,?,?,?,now(),2,?);";*/

		  $sql="insert into productos values(null,?,?,?,?,now(),2,?);";

  	  	  $sql=$conectar->prepare($sql);

  	  	  //$sql->bindValue(1,$_POST["idproducto"]);
		  $sql->bindValue(1,$_POST["nombre"]);
		  $sql->bindValue(2,$_POST["precio"]);
		  $sql->bindValue(3,$_POST["cantidad"]);
  	  	  $sql->bindValue(4,$_POST["descripcion"]);
  	  	  $sql->bindValue(5,$_POST["idproveedor"]); 
  	  	  $sql->execute();

  	  	  $resultado=$sql->fetch(PDO::FETCH_ASSOC);
		  //var_dump($sql->errorInfo());

  	  	  header("Location:".Conectar::ruta()."agregar_entrada.php?m=2");
  	  	  exit();
  	  }

  	  public function get_entrada_por_id($id_entrada){

  	  	    $conectar=parent::conexion();
  	  	    parent::set_names();

  	  	   $sql="select * from productos where idproductos=?";

  	  	   $sql=$conectar->prepare($sql);

  	  	   $sql->bindValue(1, $id_entrada);

  	  	   $sql->execute();

  	  	   return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
  	  }

  	  public function editar_entrada(){


  	  	   $conectar=parent::conexion();
  	  	   parent::set_names();
		  

  	  	    if(empty($_POST["idproductos"]) or empty($_POST["nombre"]) or empty($_POST["descripcion"]) or empty($_POST["precio"]) or empty($_POST["cantidad"])){
             
             header("Location:".Conectar::ruta()."editar_entrada.php?id_entrada=".$_POST["id"]."&m=1");
             exit();
  	  	  }

  	  	  $sql="update productos set 

          idproductos=?,
          nombre=?,
          precio=?,
          cantidad=?,
          descripcion=?,
          fecha=now()
          where 
          idproductos=?
  	  	  ";

  	  	  $sql=$conectar->prepare($sql);

  	  	  $sql->bindValue(1,$_POST["idproductos"]);
  	  	  $sql->bindValue(2,$_POST["nombre"]);
  	  	  $sql->bindValue(3,$_POST["precio"]);
  	  	  $sql->bindValue(4,$_POST["cantidad"]);
  	  	  $sql->bindValue(5,$_POST["descripcion"]);
  	  	  $sql->bindValue(6,$_POST["id"]);
  	  	  $sql->execute();

  	  	  $resultado=$sql->fetch(PDO::FETCH_ASSOC);
//importante
  	  	  header("Location:".Conectar::ruta()."editar_entrada.php?idproductos=".$_POST["id"]."&m=2");
  	  	  exit();
  	  }

  	  public function eliminar_entrada($id_entrada){

          $conectar=parent::conexion();
          parent::set_names();

          $sql="delete from productos where idproductos=?";

          $sql=$conectar->prepare($sql);

          $sql->bindValue(1,$id_entrada);

          $sql->execute();

          return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
  	  }

  	   public function get_orden_compras_por_fecha(){


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

        $sql="select * from productos inner join proveedores on productos.proveedores_idproveedor=
		 proveedores.idproveedor where idproveedor=? and fecha>=? and fecha<=?;";
    
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$_POST["idproveedor"]);
        $sql->bindValue(2,$fecha_desde);
        $sql->bindValue(3,$fecha_hasta);
        $sql->execute();

        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    } 


     public function get_cant_productos_por_fecha(){

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

        $sql="select sum(cantidad) as total from productos where proveedores_idproveedor=? and fecha >=? and fecha <=?;";

    
        $sql=$conectar->prepare($sql);

        $sql->bindValue(1,$_POST["idproveedor"]);
        $sql->bindValue(2,$fecha_desde);
        $sql->bindValue(3,$fecha_hasta);
        $sql->execute();

        return $resultado=$sql->fetch(PDO::FETCH_ASSOC);
    } 



  } 

?>
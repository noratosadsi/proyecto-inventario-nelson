<?php

 require_once("class/config.php");

   if(isset($_SESSION["backend_id"])){

   	  require_once("class/entradasModulo.php");

   	  $entrada= new Entradas();

   	  $entrada->eliminar_entrada($_GET["idproductos"]);

   	  header("Location:".Conectar::ruta()."entradas.php");
      exit();
   
   } else {

   	   header("Location:".Conectar::ruta()."index.php");
   	   exit();
   }

?>
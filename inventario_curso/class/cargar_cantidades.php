<?php 
require_once 'conexion.php';

function getCantidades(){
  $mysqli = getConn();
  $id = $_POST['id'];
  $query = "SELECT cantidad FROM `productos` WHERE idproductos = $id";
  $result = $mysqli->query($query);
  $cantidades = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
		//$videos .= "<option value='$row[cantidad]'>$row[cantidad]</option>";

		$cantidades= $row["cantidad"];

		
		/*for($i=1; $i <= $row; $i++){
			$lista. ="<option value='$lista'>$lista</option>";
		}*/
  }

//comprueba si la cantidad es igual a 0 para no registrar la venta

	if ($cantidades==0){
		
		$cantidades .= "<option value='0'>0</option>";

	}

	else{

		foreach (range(1, $cantidades) as $num):
			//echo $videos .= "<option value='$num'>$num</option>";
            $cantidades .= "<option value='$num'>$num</option>";
		endforeach;
	}
          
 return $cantidades;
}

echo getCantidades();

?>
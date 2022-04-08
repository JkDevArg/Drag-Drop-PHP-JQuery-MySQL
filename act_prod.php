<?php
	if(isset($_POST["orden"])) {
		include("conexion.php");
		$orden  = explode(",",$_POST["orden"]);
		for($i=0; $i < count($orden);$i++) {
			$sql = "UPDATE productos SET prioridad='" . $i . "' WHERE id=". $orden[$i];
			mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));	
		}
	}
?>
<?php

include 'db.php';

if ( isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['celular']) && isset($_POST['contrasena']) ){
	
	$nombre 	= $_POST['nombre'];
	$correo 	= $_POST['correo'];
	$celular 	= $_POST['celular'];
	$contrasena = $_POST['contrasena'];

	$query = "SELECT * FROM usuarios WHERE correo='".$correo."' LIMIT 1";

	if ( !mysql_num_rows(mysql_query($query)) ){

		mysql_query("INSERT INTO usuarios SET correo='".$correo."',contrasena='".$contrasena."',nombre='".$nombre."',celular='".$celular."'");

		$row['status']	= "1";
		$row['error']	= "OK";
		$row_set[] 		= $row;

	} else {
		$row['status']	= "0";
		$row['error']	= "Correo electrónico ya utilizado.";
		$row_set[] 		= $row;
	}

	echo json_encode($row_set);
	
} else {
	header("HTTP/1.0 403 Forbidden");
}

?>
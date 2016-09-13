<?php

include 'db.php';

if ( isset($_POST['usuario']) && isset($_POST['contrasena']) ){
	
	$usuario 	= $_POST['usuario'];
	$contrasena = $_POST['contrasena'];

	$query = "SELECT * FROM usuarios WHERE correo='".$usuario."' AND contrasena='".$contrasena."' LIMIT 1";

	if ( mysql_num_rows(mysql_query($query)) ){
 	
 		$data = mysql_fetch_object(mysql_query($query));

		$row['status']		= "1";
		$row['error']		= "OK";
		$row['idusuario']	= $data->idusuarios;
		$row['nombre']		= $data->nombre;
		$row['correo']		= $data->correo;
		$row_set[] 			= $row;

	} else {
		$row['status']	= "0";
		$row['error']	= "Usuario o contraseña incorrecta.";
		$row_set[] 		= $row;
	}

	echo json_encode($row_set);
	
} else {
	header("HTTP/1.0 403 Forbidden");
}

?>
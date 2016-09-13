<?php

include 'db.php';

if ( isset($_GET['id']) ){

	$id   	= $_GET['id'];
	$query 	= mysql_fetch_object(mysql_query("SELECT * FROM usuarios WHERE idusuarios='".$id."' LIMIT 1"));

	$row['idusuario'] 		= (int)$query->idusuarios;
	$row['nombre'] 			= $query->nombre;
	$row['imagen'] 			= $query->imagen;
	$row['publicaciones']	= "10";
	$row['seguidores']		= "11";
	$row_set[] 				= $row;

	echo json_encode($row_set);

} else {
	#header("");
}
?>
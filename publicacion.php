<?php

include 'db.php';

if ( isset($_GET['id']) ){

	$id = mysql_real_escape_string($_GET['id']);

	$query = mysql_fetch_object(mysql_query("SELECT 
		publicaciones.*,
		usuarios.idusuarios,
		usuarios.nombre,
		usuarios.imagen AS imagenperfil,
		subcategorias.subcategoria
		FROM 
		publicaciones
		JOIN usuarios ON usuarios.idusuarios=publicaciones.idusuario
		JOIN subcategorias ON subcategorias.idsubcategorias=publicaciones.idsubcategoria
		WHERE 
		publicaciones.idpublicaciones='".$id."' LIMIT 1"));
		
		$row['id'] 				= (int)$query->idpublicaciones;
		$row['idcategoria']		= $query->idcategoria;
		$row['idsubcategoria']	= $query->idsubcategoria;
		$row['subcategoria']	= $query->subcategoria;
		$row['hora']			= $query->hora;
		$row['titulo']			= $query->titulo;
		$row['descripcion']		= $query->descripcion;
		$row['imagen']			= $query->imagen;
		$row['likes']			= $query->likes;
		$row['comentarios']		= "0";
		$row['idusuario']		= $query->idusuario;
		$row['nombre']			= $query->nombre;
		$row['imagenperfil']	= $query->imagenperfil;
		$row_set[] 				= $row;

	if ( !empty($row_set) ){
		echo json_encode($row_set);
	}

} else {
	header("HTTP/1.0 403 Forbidden");
}

?>
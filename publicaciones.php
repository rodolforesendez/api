<?php

include 'db.php';

if ( isset($_GET['catid']) && isset($_GET['subid']) ){

	$catid = mysql_real_escape_string($_GET['catid']);
	$subid = mysql_real_escape_string($_GET['subid']);

	$query = mysql_query("SELECT 
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
		publicaciones.idcategoria='".$catid."' AND 
		publicaciones.idsubcategoria='".$subid."' 
		ORDER BY publicaciones.idpublicaciones DESC") or die(mysql_error());


	while($q = mysql_fetch_object($query)){
		
		$row['id'] 				= (int)$q->idpublicaciones;
		$row['idcategoria']		= $q->idcategoria;
		$row['idsubcategoria']	= $q->idsubcategoria;
		$row['subcategoria']	= $q->subcategoria;
		$row['hora']			= $q->hora;
		$row['titulo']			= $q->titulo;
		$row['imagen']			= $q->imagen;
		$row['likes']			= $q->likes;
		$row['comentarios']		= "0";
		$row['idusuario']		= $q->idusuario;
		$row['nombre']			= $q->nombre;
		$row['imagenperfil']	= $q->imagenperfil;
		$row_set[] 				= $row;
	}	

	if ( !empty($row_set) ){
		echo json_encode($row_set);
	}

} else {
	
	$query = mysql_query("SELECT 
		publicaciones.*,
		usuarios.idusuarios,
		usuarios.nombre,
		usuarios.imagen AS imagenperfil,
		subcategorias.subcategoria
		FROM 
		publicaciones
		JOIN usuarios ON usuarios.idusuarios=publicaciones.idusuario
		JOIN subcategorias ON subcategorias.idsubcategorias=publicaciones.idsubcategoria
		ORDER BY publicaciones.idpublicaciones DESC") or die(mysql_error());


	while($q = mysql_fetch_object($query)){
		
		$row['id'] 				= (int)$q->idpublicaciones;
		$row['idcategoria']		= $q->idcategoria;
		$row['idsubcategoria']	= $q->idsubcategoria;
		$row['subcategoria']	= $q->subcategoria;
		$row['hora']			= $q->hora;
		$row['titulo']			= $q->titulo;
		$row['imagen']			= $q->imagen;
		$row['likes']			= $q->likes;
		$row['comentarios']		= "0";
		$row['idusuario']		= $q->idusuario;
		$row['nombre']			= $q->nombre;
		$row['imagenperfil']	= $q->imagenperfil;
		$row_set[] 				= $row;
	}	

	if ( !empty($row_set) ){
		echo json_encode($row_set);
	}

}

?>
<?php

include 'db.php';

if ( isset($_GET['catid']) ){

	$catid = mysql_real_escape_string($_GET['catid']);

	$query = mysql_fetch_object(mysql_query("SELECT * FROM categorias WHERE idcategorias='".$catid."' LIMIT 1"));
	$row_set = array( "idcategoria" => $query->idcategorias, "categoria" => $query->categoria);
	
	$query = mysql_query("SELECT * FROM subcategorias WHERE idcategoria='".$catid."' ORDER BY subcategoria ASC");
	while($q = mysql_fetch_object($query)){
		
		$row['id'] 					= (int)$q->idsubcategorias;
		$row['subcategoria']		= $q->subcategoria;
		$row['imagen'] 				= $q->imagen;
		$row_set['subcategorias'][] = $row;

	}

	echo json_encode($row_set);

} else {
	header("HTTP/1.0 403 Forbidden");
}

?>
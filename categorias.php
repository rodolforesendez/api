<?php

include 'db.php';

$query = mysql_query("SELECT * FROM categorias ORDER BY idcategorias ASC");

while($q = mysql_fetch_object($query)){
	
	$row['id'] 			= (int)$q->idcategorias;
	$row['categoria']	= $q->categoria;
	$row_set[] 			= $row;

}

echo json_encode($row_set);
?>
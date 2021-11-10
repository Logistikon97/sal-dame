<?php
/*
TX.PHP ESCRIBE EL TEXTO QUE DEBE MOSTRAR EN EL LCD EN UN FORMATO QUE EL ENTIENDA.
CADA 5 SEGUNDOS EL ESP LEERÁ LOS RESULTADOS QUE LE ESTREGUE ESTE ARCHIVO.
 */
include("config.php");
$result = $connection->query("SELECT * FROM ESPtable2");//obtiene la información de la tabla
$result->setFetchMode(PDO::FETCH_ASSOC);//organiza los resultados para trabajarlos con id->valor como está en la BD
while($row = $result->fetch()) {
//si cincide el identifiacdor entonces toma el texto que hay allí	
if($row['id'] == 1){		
		$n6 = $row['TEXT_1'];
		echo " _n6$n6##";//el ESP recibe esto así: _n6Texto para mostrar##
}	
}
?>

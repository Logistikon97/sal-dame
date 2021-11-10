<?php
include("config.php");
$result = $connection->query("SELECT * FROM ESPtable2");
$result->setFetchMode(PDO::FETCH_ASSOC);
while($row = $result->fetch()) {
if($row['id'] == 99999){		
		$n6 = $row['TEXT_1'];
		echo " _n6$n6##";
}	
}
?>
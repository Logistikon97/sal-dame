<?php
/*
ACTUALIZA LOS DATOS EN LA BASE DE DATOS Y COMPRUEBA SI HA SOLICITADO CERRAR SESIÓN
*/
session_start();
include('config.php');//conexión con la BD
//verifica si cierra sesión
if (isset($_POST['logout'])) {
  //cambia el estado de logged a 0 
  $query = $connection->prepare("UPDATE users SET logged =0 WHERE username=:username");
  $query->bindParam("username", $_SESSION["user_name"], PDO::PARAM_STR);
  $query->execute();
  session_destroy();//elimina los datos de las variables de sesión.
  header("Location:login.php");//redirige a login.php
}
  $value = $_POST['value'];		//obtiene el texto escrito
  //actualiza el texto de la fila con el id 1
  $query = $connection->prepare("UPDATE ESPtable2 SET TEXT_1 =:value  WHERE id=1");
  $query->bindParam("value", $value, PDO::PARAM_STR);
  $query->execute();
echo '<p>Se ha enviado el texto correctamente</p>';
?>
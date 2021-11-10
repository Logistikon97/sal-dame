<?php
session_start();
include('config.php');
//verifica si cierra sesión
if (isset($_POST['logout'])) {
  $query = $connection->prepare("UPDATE users SET logged =0 WHERE username=:username");
                $query->bindParam("username", $_SESSION["user_name"], PDO::PARAM_STR);
                $query->execute();
  session_destroy();
  header("Location:login.php");
  die();
} else {
  // Show users the page!
}
$value = $_POST['value'];		//Get the value
//connect to the database 
        $query = $connection->prepare("UPDATE ESPtable2 SET TEXT_1 =:value  WHERE id=99999");
        $query->bindParam("value", $value, PDO::PARAM_STR);
        $query->execute();
//go back to the interface
  header("location:/index.php");
  die();
?>
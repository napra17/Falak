<?php

$id_horas = $_GET["id"];


include ("../conexion.php");

$sql = "DELETE from horas where id_horas = $id_horas";
$query = mysqli_query($con,$sql);

if (!$query) {
    throw new Exception(mysqli_error($con)."$sql");
}else {


	$mensaje = "Horas eliminadas correctamente.";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = '../profesores.php';";
echo "</script>";  }

?>



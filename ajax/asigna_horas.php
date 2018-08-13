<?php

$id_profesor = $_POST["id"];
$horas = $_POST["horas"];
$fecha = $_POST["fecha"];
$newDate = date(Ymd,strtotime($fecha));
	

include ("../conexion.php");

$sql = "INSERT into horas (fecha, horas, id_profesor) values ($newDate, $horas, $id_profesor)";
$query = mysqli_query($con,$sql);

if (!$query) {
    throw new Exception(mysqli_error($con)."$sql");
}else {


	$mensaje = "Las Horas fueron asignadas correctamente.";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = '../horas.php?id=$id_profesor';";
echo "</script>";  }

?>



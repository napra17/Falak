<?php 

include ("../conexion.php");
$asigna = $_GET["id"];

$query = "DELETE from asigna_clase where id_asigna = '".$asigna."'";

$delete = mysqli_query($con, $query);

if (!$delete) {
    throw new Exception(mysqli_error($con)."$query");
}else {
	$mensaje = "El alumnos ha sido eliminado correctamente.";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = '../clases.php';";
echo "</script>";  
}



?>
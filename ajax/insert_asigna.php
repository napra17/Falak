<?php
if(isset($_POST['submit'])){
if(!empty($_POST['clase'])) {

$alumno = $_POST["id_alumno"];


include ("../conexion.php");



foreach($_POST['clase'] as $selected) {

	$control = "SELECT id_asigna from asigna_clase where id_alumno = '".$alumno."' and id_clase = '".$selected."'";
	$qcontrol = mysqli_query($con, $control);
	$row_cnt = mysqli_num_rows($qcontrol);

	if ($row_cnt >= 1){
		$sql = "UPDATE asigna_clase set id_clase = ".$selected." where id_alumno = ".$alumno." ";
		$query = mysqli_query($con,$sql);
	}else {


	$sql = "insert into asigna_clase (id_clase, id_alumno) values (".$selected.", ".$alumno.")";
	$query = mysqli_query($con,$sql);
}
}
if (!$query) {
    throw new Exception(mysqli_error($con)."$sql");
}else {
	$mensaje = "El alumnos ha sido asignado correctamente.";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = '../alumnos.php';";
echo "</script>";  
}
}}
?>



<?php  
$id_profesor = $_GET["id"];
$mes = $_GET["mes"];

if ($mes == 'Enero'){
	$mes = 1;
}elseif ($mes == 'Febrero'){
	$mes = 2;
}elseif ($mes == 'Marzo'){
	$mes = 3;
}elseif ($mes == 'Abril') {
	$mes = 4;
}elseif ($mes == 'Mayo'){
	$mes = 5;
}elseif ($mes == 'Junio') {
	$mes = 6;
}elseif ($mes == 'Julio') {
	$mes = 7;
}elseif ($mes == 'Agosto') {
	$mes = 8;
}elseif ($mes == 'Septiembre') {
	$mes = 9;
}elseif ($mes == 'Octubre') {
	$mes = 10;
}elseif ($mes == 'Noviembre') {
	$mes = 11;
}elseif ($mes == 'Diciembre') {
	$mes = 6;
}

echo $mes;

include ("../conexion.php");

$sql ="";


?>
<?php 


$mes = $_POST["mes"];
$anio = $_POST["anio"];

require ("../conexion.php");

$sql= "SELECT Apellido, Nombre from alumnos
where id_alumno not in (select id_alumno from pagos where mes = $mes and anio= $anio  and id_pago = 1)";
$result = mysqli_query ($con, $sql);
$count = mysqli_num_rows($result);

if ($count > 0){
header("Pragma: public");
header("Expires: 0");
$filename = "reporte_deuda_mensual.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<meta charset="UTF-8">
<table>
	<thead>
		<tr>
			
			<th>Apellido</th>
			<th>Nombre</th>

		</tr>
	</thead>
	<tbody>
		<?php 
		while($row = mysqli_fetch_array($result)){

			$apellido = $row["Apellido"];
			$nombre = $row["Nombre"];

		 ?>
		 <tr>

		 	<td><?php echo $apellido; ?></td>
		 	<td><?php echo $nombre; ?></td>

		 </tr>
		<?php } ?>
	</tbody>
</table>

<?php } else{
	echo '<script language="javascript">alert("No hay registros para el periodo seleccionado");</script>';
	echo '<script language="javascript">window.history.back(-1);</script>';  
}?>
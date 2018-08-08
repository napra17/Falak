<?php 

header("Pragma: public");
header("Expires: 0");
$filename = "reporte_mensual.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

$mes = $_POST["periodo"];

require ("../conexion.php");

$sql= "SELECT pagos.id_pagos, tipopago.nombre concepto, alumnos.Apellido, alumnos.Nombre, pagos.importe, pagos.mes, pagos.anio, pagos.fecha from
	pagos left join 
	alumnos on alumnos.id_alumno = pagos.id_alumno
	inner join tipopago
	on tipopago.id_tipo = pagos.id_pago where pagos.mes = $mes";
$result = mysqli_query ($con, $sql);
$count = mysqli_num_rows($result);

if ($count > 0){
?>
<meta charset="UTF-8">
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Concepto</th>
			<th>Apellido</th>
			<th>Nombre</th>
			<th>Importe</th>
			<th>Mes</th>
			<th>Año</th>
			<th>Fecha</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		while($row = mysqli_fetch_array($result)){
			$id = $row["id_pagos"];
			$concepto = $row["concepto"];
			$apellido = $row["Apellido"];
			$nombre = $row["Nombre"];
			$importe = $row["importe"];
			$mes = $row["mes"];
			$año = $row["anio"];
			$fecha = $row["fecha"];
		 ?>
		 <tr>
		 	<td><?php echo $id; ?></td>
		 	<td><?php echo $concepto; ?></td>
		 	<td><?php echo $apellido; ?></td>
		 	<td><?php echo $nombre; ?></td>
		 	<td><?php echo $importe; ?></td>
		 	<td><?php echo $mes; ?></td>
		 	<td><?php echo $año; ?></td>
		 	<td><?php echo $fecha; ?></td>
		 </tr>
		<?php } ?>
	</tbody>
</table>

<?php } else{
	echo "alert('No hay pagos para el mes seleccionado');";
}?>
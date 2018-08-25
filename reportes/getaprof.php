<?php 

$id = $_POST["id"];

require ("../conexion.php");

if ($id == "*"){
	$sql = "SELECT profesores.Apellido, profesores.Nombre, profesores.DNI, horas.fecha, horas.horas, horas.estado
from profesores inner join horas on profesores.id_profesor = horas.id_profesor";
} else{
	$sql = "SELECT profesores.Apellido, profesores.Nombre, profesores.DNI, horas.fecha, horas.horas, horas.estado
from profesores inner join horas on profesores.id_profesor = horas.id_profesor where profesores.id_profesor = $id";
}

$result = mysqli_query ($con, $sql);
$count = mysqli_num_rows($result);

if ($count > 0){
header("Pragma: public");
header("Expires: 0");
$filename = "reporte_profesores.xls";
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
			<th>DNI</th>
			<th>Fecha</th>
			<th>Horas</th>
			<th>Estado</th>

		</tr>
	</thead>
	<tbody>
		<?php 
		while($row = mysqli_fetch_array($result)){
			
			$apellido = $row["Apellido"];
			$nombre = $row["Nombre"];
			$dni = $row["DNI"];
			$Fecha = $row["fecha"];
			$horas = $row["horas"];
			$estado = $row["estado"];
			
		 ?>
		 <tr>
		 	<td><?php echo $apellido; ?></td>
		 	<td><?php echo $nombre; ?></td>
		 	<td><?php echo $dni; ?></td>
		 	<td><?php echo $Fecha; ?></td>
		 	<td><?php echo $horas; ?></td>
		 	<td><?php echo $estado; ?></td>

		 </tr>
		<?php } ?>
	</tbody>
</table>

<?php } else{
	echo '<script language="javascript">alert("No hay registros para su consulta");</script>';
	echo '<script language="javascript">window.history.back(-1);</script>';   
}?>
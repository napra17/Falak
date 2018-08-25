<?php 

$clase = $_POST["clase"];

require ("../conexion.php");

if ($clase == "*"){
	$sql = "SELECT * from alumnos";
} else{
	$sql = "SELECT alumnos.Apellido, alumnos.Nombre, alumnos.DNI, alumnos.Telefono, alumnos.Telefono2, alumnos.F_ingreso, alumnos.Domicilio, alumnos.Localidad, alumnos.Observaciones, alumnos.Categoria, clases.Nombre Clase
from alumnos inner join asigna_clase on alumnos.id_alumno = asigna_clase.id_alumno
inner join clases on clases.id_clase = asigna_clase.id_clase
where clases.Nombre = '$clase'";
}

$result = mysqli_query ($con, $sql);
$count = mysqli_num_rows($result);

if ($count > 0){
header("Pragma: public");
header("Expires: 0");
$filename = "reporte_alumnos.xls";
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
			<th>Telefono</th>
			<th>Telefono2</th>
			<th>Fecha Ingreso</th>
			<th>Domicilio</th>
			<th>Localidad</th>
			<th>Observaciones</th>
			<th>Categoria</th>
			<th>Clase</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		while($row = mysqli_fetch_array($result)){
			
			$apellido = $row["Apellido"];
			$nombre = $row["Nombre"];
			$dni = $row["DNI"];
			$telefono = $row["Telefono"];
			$telefono2 = $row["Telefono2"];
			$f_ingreso = $row["F_ingreso"];
			$domicilio = $row["Domicilio"];
			$localidad = $row["Localidad"];
			$observaciones = $row["Observaciones"];
			$categoria = $row["Categoria"];
			$clase = $row["Clase"];
		 ?>
		 <tr>
		 	<td><?php echo $apellido; ?></td>
		 	<td><?php echo $nombre; ?></td>
		 	<td><?php echo $dni; ?></td>
		 	<td><?php echo $telefono; ?></td>
		 	<td><?php echo $telefono2; ?></td>
		 	<td><?php echo $f_ingreso; ?></td>
		 	<td><?php echo $domicilio; ?></td>
		 	<td><?php echo $localidad; ?></td>
		 	<td><?php echo $observaciones; ?></td>
		 	<td><?php echo $categoria; ?></td>
		 	<td><?php echo $clase; ?></td>
		 </tr>
		<?php } ?>
	</tbody>
</table>

<?php } else{
	echo '<script language="javascript">alert("No hay registros para su consulta");</script>';
	echo '<script language="javascript">window.history.back(-1);</script>';   
}?>
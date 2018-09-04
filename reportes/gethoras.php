<?php 

$fdesde =$_POST["fdesde"];
$fhasta = $_POST["fhasta"];

require ("../conexion.php");

$sql= "SELECT Apellido, Nombre, fecha, f_pago, horas, estado 
from profesores 
inner join horas on horas.id_profesor = profesores.id_profesor
where fecha between '".$fdesde."' and '".$fhasta."' ";
$result = mysqli_query ($con, $sql);
$count = mysqli_num_rows($result);

if ($count > 0){
header("Pragma: public");
header("Expires: 0");
$filename = "reporte_horas.xls";
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
		
			<th>Fecha</th>
			<th>Fecha de Pago</th>
			<th>Horas</th>
			<th>Estado</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		while($row = mysqli_fetch_array($result)){

			$apellido = $row["Apellido"];
			$nombre = $row["Nombre"];
			$fecha = $row["fecha"];
			$f_pago = $row["f_pago"];
			$horas = $row["horas"];
			$estado = $row["estado"];
		 ?>
		 <tr>
		 	
		 	<td><?php echo $apellido; ?></td>
		 	<td><?php echo $nombre; ?></td>
		 	<td><?php echo $fecha; ?></td>
		 	<td><?php echo $f_pago; ?></td>
		 	<td><?php echo $horas; ?></td>
		 	<td><?php echo $estado; ?></td>
		 </tr>
		<?php } ?>
	</tbody>
</table>

<?php } else{
	echo '<script language="javascript">alert("No hay horas para el periodo seleccionado");</script>';
	echo '<script language="javascript">window.history.back(-1);</script>';  
}
	?>
<?php 


$id = $_POST["id"];
$anio = $_POST["anio"];

require ("../conexion.php");

$sql= "SELECT alumnos.id_alumno, alumnos.Apellido, alumnos.Nombre,
CASE WHEN mes = '1' and id_pago = 1 then 'Pagó' else 'Debe' END as Enero,
CASE WHEN mes = '2' and id_pago = 1 then 'Pagó' else 'Debe' END as Febrero,
CASE when mes = '3' and id_pago = 1 then 'Pagó' else 'Debe' END as Marzo,
CASE when mes = '4' and id_pago = 1 then 'Pagó' else 'Debe' END as Abril,
CASE when mes = '5' and id_pago = 1 then 'Pagó' else 'Debe' END as Mayo,
CASE when mes = '6' and id_pago = 1 then 'Pagó' else 'Debe' END as Junio,
CASE when mes = '7' and id_pago = 1 then 'Pagó' else 'Debe' END as Julio,
CASE when mes = '8' and id_pago = 1 then 'Pagó' else 'Debe' END as Agosto,
CASE when mes = '9' and id_pago = 1 then 'Pagó' else 'Debe' END as Septiembre,
CASE when mes = '10' and id_pago = 1 then 'Pagó' else 'Debe' END as Octubre,
CASE when mes = '11' and id_pago = 1 then 'Pagó' else 'Debe' END as Noviembre,
CASE when mes = '12' and id_pago = 1 then 'Pagó' else 'Debe' END as Diciembre
from pagos right join alumnos on alumnos.id_alumno = pagos.id_alumno
where anio = $anio and alumnos.id_alumno = $id
group by alumnos.id_alumno order by alumnos.id_alumno ";
$result = mysqli_query ($con, $sql);
$count = mysqli_num_rows($result);

if ($count > 0){
header("Pragma: public");
header("Expires: 0");
$filename = "estado_deuda".$id.".xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
<meta charset="UTF-8">
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Apellido</th>
			<th>Nombre</th>
			<th>Enero</th>
			<th>Febrero</th>
			<th>Marzo</th>
			<th>Abril</th>
			<th>Mayo</th>
			<th>Junio</th>
			<th>Julio</th>
			<th>Agosto</th>
			<th>Septiembre</th>
			<th>Octubre</th>
			<th>Noviembre</th>
			<th>Diciembre</th>

		</tr>
	</thead>
	<tbody>
		<?php 
		while($row = mysqli_fetch_array($result)){
			$id_alumno = $row["id_alumno"];
			$apellido = $row["Apellido"];
			$nombre = $row["Nombre"];
			$Enero = $row["Enero"];
			$Febrero = $row["Febrero"];
			$Marzo = $row["Marzo"];
			$Abril= $row["Abril"];
			$Mayo = $row["Mayo"];
			$Junio = $row["Junio"];
			$Julio = $row["Julio"];
			$Agosto = $row["Agosto"];
			$Septiembre = $row["Septiembre"];
			$Octubre = $row["Octubre"];
			$Noviembre = $row["Noviembre"];
			$Diciembre = $row["Diciembre"];
			

		 ?>
		 <tr>
			<td><?php echo $id_alumno; ?></td>
		 	<td><?php echo $apellido; ?></td>
		 	<td><?php echo $nombre; ?></td>
		 	<td><?php echo $Enero; ?></td>
		 	<td><?php echo $Febrero; ?></td>
		 	<td><?php echo $Marzo; ?></td>
		 	<td><?php echo $Abril; ?></td>
		 	<td><?php echo $Mayo; ?></td>
		 	<td><?php echo $Junio; ?></td>
		 	<td><?php echo $Julio; ?></td>
		 	<td><?php echo $Agosto; ?></td>
		 	<td><?php echo $Septiembre; ?></td>
		 	<td><?php echo $Octubre; ?></td>
		 	<td><?php echo $Noviembre; ?></td>
		 	<td><?php echo $Diciembre; ?></td>
		 	

		 </tr>
		<?php } ?>
	</tbody>
</table>

<?php } else{
	echo '<script language="javascript">alert("Atencion!! El alumno no registra ningun pago en todo el periodo seleccionado");</script>';
	echo '<script language="javascript">window.history.back(-1);</script>';  
}?>
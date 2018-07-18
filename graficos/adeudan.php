<?php 
include ('../conexion.php');


$sql = "SELECT alumnos.Apellido, alumnos.Nombre 
from alumnos left join pagos on pagos.id_alumno = alumnos.id_alumno
where alumnos.id_alumno not in (select id_alumno from pagos)
order by alumnos.Apellido asc
limit 9";

$stm = mysqli_query ($con,$sql);

 ?>
<link rel="stylesheet" href="css/tabla.css">
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Adeudan</title>
 </head>
 <body>
 <table border="1" id="mitabla">
 	
 	<thead>
 		<tr>
 			<th>Apellido</th>
 			<th>Nombre</th>
 		</tr>
 	</thead>
 	<tbody>
						<?php 
						while($row = mysqli_fetch_array($stm)){	
														
							$apellido=$row['Apellido'];
							$nombre=$row['Nombre'];

						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $apellido;?></td>
							
							<td class='text-center'><?php echo $nombre;?></td>

</tr><?php } ?>
 
 	</tbody>
 </table>
 </body>
 </html>
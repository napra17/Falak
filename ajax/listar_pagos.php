<?php
	
	/* Connect To Database*/
	require_once ("../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="pagos  left join
	clases  on pagos.id_clase = clases.id_clase
	inner join
	alumnos  on pagos.id_alumno = alumnos.id_alumno";
	$campos="*";
	$sWhere="alumnos.Apellido LIKE '%".$query."%'";
	$sWhere.=" order by pagos.fecha";
	
	
	
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT pagos.id_pagos, clases.Nombre Clase, alumnos.Apellido, alumnos.Nombre, pagos.importe, pagos.mes, pagos.anio, pagos.fecha from
	pagos  left join
	clases  on pagos.id_clase = clases.id_clase
	inner join
	alumnos  on pagos.id_alumno = alumnos.id_alumno where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data

	
	
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>ID</th>
						
						<th class='text-center'>Alumno</th>
						<th class='text-center'>Periodo</th>
						<th class='text-center'>Importe</th>
						<th class='text-center'>Fecha</th>
						

						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id_pagos=$row['id_pagos'];
							
							$apellido=$row['Apellido'];
							$nombre=$row['Nombre'];
							$mes=$row['mes'];
							$anio=$row['anio'];
							$importe=$row['importe'];
							$fecha = $row['fecha'];

							$periodo = $mes . '/' . $anio;
							$alumno = $apellido . ', ' . $nombre;
						
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $id_pagos;?></td>
							
							<td class='text-center'><?php echo $alumno;?></td>
							<td class='text-center'><?php echo $periodo;?></td>
							<td class='text-center'><?php echo $importe;?></td>
							<td class='text-center'><?php echo $fecha;?></td>
							

							<td>
								<a  target="_blank" rel="noopener noreferrer" href='./recibo.php?id=<?php echo $id_pagos; ?>'>
								<i class="material-icons" title="recibo">print</i></a>
								
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $id_clase;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>                          
						</tr>
						<?php }?>
						<tr>
							<td colspan='6'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	

	
	
	<?php	
	}	
}
?>          
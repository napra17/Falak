<?php
	
	/* Connect To Database*/
	require_once ("../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="clases";
	$campos="*";
	$sWhere=" clases.Nombre LIKE '%".$query."%'";
	$sWhere.=" order by clases.Nombre";
	
	
	
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
	$query = mysqli_query($con,"SELECT clases.id_clase, clases.Nombre, clases.Dias, clases.Horario, concat (Profesores.Apellido,', ', Profesores.Nombre) Profesor, clases.Mensualidad
FROM clases
LEFT JOIN  Profesores  on clases.Profesor = Profesores.id_profesor where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data

	
	
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>ID</th>
						<th class='text-center'>Nombre</th>
						<th class='text-center'>Dias</th>
						<th class='text-center'>Horario</th>
						<th class='text-center'>Profesor</th>

						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id_clase=$row['id_clase'];
							$nombre=$row['Nombre'];
							$dias=$row['Dias'];
							$hora=$row['Horario'];
							$profesor=$row['Profesor'];
						
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $id_clase;?></td>
							<td class='text-center'><?php echo $nombre;?></td>
							<td class='text-center'><?php echo $dias;?></td>
							<td class='text-center'><?php echo $hora;?></td>
							<td class='text-center'><?php echo $profesor;?></td>
							<td><a href='./clasebyid.php?id=<?php echo $id_clase; ?>'>
								<i class="material-icons" title="Alumnos">group</i></a></td>

							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-name='<?php echo $nombre;?>' data-dias="<?php echo $dias?>" data-profesor="<?php echo $profesor?>" data-hora="<?php echo $hora?>" data-id="<?php echo $id_clase; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
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
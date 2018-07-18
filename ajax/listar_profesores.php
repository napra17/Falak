<?php
	
	/* Connect To Database*/
	require_once ("../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="profesores";
	$campos="*";
	$sWhere=" profesores.Apellido LIKE '%".$query."%'";
	$sWhere.=" order by profesores.Apellido";
	
	
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
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data
	


		
	
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>ID</th>
						<th class='text-center'>Apellido </th>
						<th class='text-center'>Nombre </th>
						<th class='text-center'>DNI</th>

						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id_profesor=$row['id_profesor'];
							$apellido=$row['Apellido'];
							$nombre=$row['Nombre'];
							$dni=$row['DNI'];
						
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $id_profesor;?></td>
							<td class='text-center'><?php echo $apellido;?></td>
							<td class='text-center'><?php echo $nombre;?></td>
							<td class='text-center'><?php echo $dni;?></td>

							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-ape='<?php echo $apellido;?>' data-name="<?php echo $nombre?>" data-dni="<?php echo $dni?>" data-id="<?php echo $id_profesor; ?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $id_profesor;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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
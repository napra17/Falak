<?php
	
	/* Connect To Database*/
	require_once ("../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="alumnos";
	$campos="*";
	$sWhere=" alumnos.Apellido LIKE '%".$query."%'";
	$sWhere.=" order by alumnos.Apellido";
	
	
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
						
						<th>Apellido </th>
						<th>Nombre </th>
						<th class='text-center'>DNI</th>
						<th class='text-center'>Telefono</th>
						<th class='text-center'>Domicilio</th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id_alumno=$row['id_alumno'];
							$apellido=utf8_encode($row['Apellido']);
							$nombre=utf8_encode($row['Nombre']);
							$dni=$row['DNI'];
							$telefono=$row['Telefono'];
							$telefono2=$row['Telefono2'];
							$localidad=$row['Localidad'];
							$domicilio= utf8_encode($row['Domicilio']);
							$observaciones=$row['Observaciones'];
							$categoria=$row['Categoria'];						
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
							
							<td class='text-center'><?php echo $apellido;?></td>
							<td ><?php echo $nombre;?></td>
							<td ><?php echo $dni;?></td>
							<td class='text-center' ><?php echo $telefono;?></td>
							<td class='text-center'><?php echo $domicilio;?></td>
							
							<td><a href='./asignaciones.php?id=<?php echo $id_alumno ?>'>
								<i class="material-icons" title="Alumnos">group</i></a></td>
							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-ape='<?php echo $apellido;?>' 
								data-name="<?php echo $nombre?>" 
								data-dni="<?php echo $dni?>" 
								data-observaciones="<?php echo $observaciones?>" 
								data-categoria="<?php echo $categoria?>" 
								data-telefono="<?php echo $telefono?>" 
								data-telefono2="<?php echo $telefono2?>" 
								data-domicilio="<?php echo $domicilio;?>" 
								data-localidad="<?php echo $localidad;?>" 
								data-id="<?php echo $id_alumno; ?>">
								<i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $id_alumno;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>

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
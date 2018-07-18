<?php
	
	/* Connect To Database*/
	require_once ("../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="descuentos";
	$campos="*";
	$sWhere=" descripcion LIKE '%".$query."%'";
	$sWhere.=" order by id";
	
	
	
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
	$query = mysqli_query($con,"SELECT descuentos.id, tipopago.nombre, descuentos.descripcion, descuentos.porcentaje from descuentos inner join tipopago on tipopago.id_tipo = descuentos.tipo where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data

	
	
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>ID</th>
						<th class='text-center'>Tipo</th>
						<th class='text-center'>Descripcion</th>
						<th class='text-center'>Porcentaje</th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id= $row["id"];
							$tipo = $row["nombre"];
							$descripcion = $row["descripcion"];
							$porcentaje = $row["porcentaje"];
							
						
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $id;?></td>
							<td class='text-center'><?php echo $tipo;?></td>
							<td class='text-center'><?php echo $descripcion;?></td>
							<td class='text-center'><?php echo $porcentaje;?></td>
							

							<td>
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-tipo="<?php echo $tipo?>" 
								data-desc="<?php echo $descripcion?>" 
								data-porc="<?php echo $porcentaje?>" 
								data-id="<?php echo $id?>">
								<i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
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
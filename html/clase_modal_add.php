<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Clase</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="name"  id="name" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Dias</label>
							<input type="text" name="dias" id="dias" class="form-control" >
						</div>
						<div class="form-group">
							<label>Horario</label>
							<input type="time" name="horario" id="horario" class="form-control" >
						</div>
						<div class="form-group">
							<label>Profesor</label>
						</br>
							<!--<select name="profesor" id="profesor" multiple>-->
						<?php 
							include ("conexion.php");
							$lee_prof = "SELECT * FROM profesores";
							$resul_prof = mysqli_query($con, $lee_prof);
							echo '<select name="profesor" id="profesor">';
      						while($row = mysqli_fetch_array($resul_prof))
      						{
						     echo "<option value='".$row["id_profesor"]."'>".$row["Apellido"].", ".$row["Nombre"]."";
						     echo "</option>";}
   						?>
     						</select>
						<!--<input  name="profesor" id="profesor" class="form-control" required>-->
						</div>
						<!--<div class="form-group">
							<label>Mensualidad</label>
							<input type="number" name="precio" id="precio" class="form-control" required>
						</div>-->				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>
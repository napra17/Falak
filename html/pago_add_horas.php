<script language="javascript" src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>


<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Pago de horas</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>

					<div class="modal-body">					
						<div class="form-group">
							<label>Alumno</label>
						<?php 
							include ("conexion.php");
							$lee_alum = "SELECT * FROM alumnos order by Apellido ";
							$resul_alum = mysqli_query($con, $lee_alum);
							echo '<select name="alumno" id="alumno">';
      						while($row = mysqli_fetch_array($resul_alum))
      						{
      							$id_alumno = $row["id_alumno"];
      							$apellido = utf8_encode($row['Apellido']);
      							$nombre = utf8_encode($row['Nombre']);
						     echo "<option value='".$row["id_alumno"]."'>".$apellido.", ".$nombre."";
						     echo "</option>";}
   						?>
     						</select>	
							
						</div>
						

						<div class="form-group" id="respuesta">
							
						</div>
						<div class="form-group">
							<label>Periodo</label>
							<select name="periodo">
								<option value="1">Enero</option>
								<option value="2">Febrero</option>
								<option value="3">Marzo</option>
								<option value="4">Abril</option>
								<option value="5">Mayo</option>
								<option value="6">Junio</option>
								<option value="7">Julio</option>
								<option value="8">Agosto</option>
								<option value="9">Septiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Noviembre</option>
								<option value="12">Diciembre</option>
								
							</select>
						</div>
						<div class="form-group">
							<label>Año</label>
							<select name="anio">
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2029</option>
								<option value="2021">2020</option>
								<option value="2022">2021</option>
								<option value="2023">2022</option>
														
							</select>
						</div>						
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>

	

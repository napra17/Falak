<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Alumno</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Apellido</label>
							<input type="text" name="apellido"  id="apellido" class="form-control" required>
							
						</div>
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="name" id="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>DNI</label>
							<input type="text" name="dni" id="dni" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Telefono</label>
							<input type="number" name="telefono" id="telefono" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Domicilio</label>
							<textarea type="text" name="domicilio" id="domicilio" class="form-control" required>
							</textarea>
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
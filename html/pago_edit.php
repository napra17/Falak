<div id="editProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_product" id="edit_product">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Alumno</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Apellido</label>
							<input type="text" name="edit_ape"  id="edit_ape" class="form-control" required>
							<input type="hidden" name="edit_id" id="edit_id" >
						</div>
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="edit_name" id="edit_name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>DNI</label>
							<input type="number" name="edit_dni" id="edit_dni" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Telefono</label>
							<input type="number" name="edit_tel" id="edit_tel" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Domicilio</label>
							<input type="text" name="edit_domi" id="edit_domi" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Guardar datos">
					</div>
				</form>
			</div>
		</div>
	</div>
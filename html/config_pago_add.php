<div id="addProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Bonificacion/Recargo</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Tipo</label>
							<select name="tipo"  id="tipo" class="form-control">
								<option value="0">Inscripcion</option>
								<option value="1">Cuota</option>
								<option value="2">Recargo</option>
								<option value="3">Bonificacion</option>
							</select>
							
						</div>
						<div class="form-group">
							<label>Descripcion</label>
							<input type="text" name="desc" id="desc" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Porcentaje / Importe</label>
							<input type="number" name="porc" id="porc" class="form-control" required>
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
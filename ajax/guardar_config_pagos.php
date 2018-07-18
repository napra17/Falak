<?php
	if (empty($_POST['porc'])){
		$errors[] = "Debe ingresar un Tipo.";
	} elseif (!empty($_POST['porc'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $tipo = mysqli_real_escape_string($con,(strip_tags($_POST["tipo"],ENT_QUOTES)));
	$desc = mysqli_real_escape_string($con,(strip_tags($_POST["desc"],ENT_QUOTES)));
	$porc = intval($_POST["porc"]);
	

	
	

	// REGISTER data into database
    $sql = "INSERT INTO descuentos (tipo, descripcion, porcentaje) VALUES ('$tipo','$desc','$porc')";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "El registro ha sido guardado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>
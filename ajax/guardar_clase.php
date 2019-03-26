<?php

session_start();

	if (empty($_POST['name'])){
		$errors[] = "Debe ingresar un Nombre.";
	} elseif (!empty($_POST['name'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $dias = mysqli_real_escape_string($con,(strip_tags($_POST["dias"],ENT_QUOTES)));
	$nombre = mysqli_real_escape_string($con,(strip_tags($_POST["name"],ENT_QUOTES)));
	$horario = mysqli_real_escape_string($con,(strip_tags($_POST["horario"],ENT_QUOTES)));
	$profesor = mysqli_real_escape_string($con,(strip_tags($_POST["profesor"],ENT_QUOTES)));
	$timestamp = date("Y-m-d H:i:s"); 
	$mensualidad = intval($_POST["precio"]);
	$detalle = $nombre. ';' . $profesor;
	$usuario = $_SESSION['session_username'];

	// REGISTER data into database
    $sql = "INSERT INTO clases (Nombre, Dias, Horario, Profesor) VALUES ('$nombre','$dias','$horario', '$profesor')";
    $sqla = "INSERT INTO auditoria (usuario, fecha, accion, detalle) VALUES ('$usuario','$timestamp','Agregar Clase','$detalle');";

    $query = mysqli_query($con,$sql);

    // if product has been added successfully
    if ($query) {
    	$audit = mysqli_query($con, $sqla);
        $messages[] = "La clase ha sido guardado con éxito.";
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
<?php
session_start();


	if (empty($_POST['apellido'])){
		$errors[] = "Debe ingresar un Apellido.";
	} elseif (!empty($_POST['apellido'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $apellido = mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
	$nombre = mysqli_real_escape_string($con,(strip_tags($_POST["name"],ENT_QUOTES)));
	$dni = intval($_POST["dni"]);
	$telefono = intval($_POST["telefono"]);
	$domicilio = mysqli_real_escape_string($con,(strip_tags($_POST["domicilio"],ENT_QUOTES)));
	$fecha = date("Y-m-d H:i:s");  
	$detalle = $apellido .';'. $nombre .';'. $dni;
	$usuario = $_SESSION['session_username'];

	// REGISTER data into database
    $sql = "INSERT INTO alumnos(Apellido, Nombre, DNI, Telefono, Domicilio) VALUES ('$apellido','$nombre','$dni','$telefono','$domicilio');";
    $sqla = "INSERT INTO auditoria (usuario, fecha, accion, detalle) VALUES ('$usuario','$fecha','Agregar Alumno','$detalle');";

    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {

    	$audit = mysqli_query($con, $sqla);
        $messages[] = "El Alumno ha sido guardado con éxito.";
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
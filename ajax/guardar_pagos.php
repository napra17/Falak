<?php

session_start();
	if (empty($_POST['alumno'])){
		$errors[] = "Debe ingresar un Alumno.";
	} elseif (!empty($_POST['alumno'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    
	$alumno = mysqli_real_escape_string($con,(strip_tags($_POST["alumno"],ENT_QUOTES)));
	$tipo = $precio = intval($_POST["tipo"]);
	$precio = intval($_POST["precio"]);
	$periodo = intval($_POST["periodo"]);
	$anio = intval($_POST["anio"]);
	$fecha = date(Ymd);
	$timestamp = date("Y-m-d H:i:s");  
	$detalle = $alumno .';'. $tipo .';'. $precio.';'.$periodo.';'.$anio;
	$usuario = $_SESSION['session_username'];
	
	

	// REGISTER data into database
    $sql = "INSERT INTO pagos(id_alumno, id_pago,importe, mes, anio, fecha) VALUES ('$alumno','$tipo','$precio','$periodo','$anio','$fecha');";

    $sqla = "INSERT INTO auditoria (usuario, fecha, accion, detalle) VALUES ('$usuario', '$timestamp', 'Agregar Pago',
	(select concat (Apellido,',',Nombre, ';' ,(select nombre from tipopago where id_tipo = '$tipo'),';',$precio,';',$periodo, ';', $anio) 
	from alumnos where id_alumno = '$alumno'));";

    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
    	$audit = mysqli_query($con, $sqla);
        $messages[] = "El Pago ha sido registrado con éxito.";
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
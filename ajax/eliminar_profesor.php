<?php
	if (empty($_POST['delete_id'])){
		$errors[] = "Id vacío.";
	} elseif (!empty($_POST['delete_id'])){
	require_once ("../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
    $id_profesor=intval($_POST['delete_id']);
	$timestamp = date("Y-m-d H:i:s");  
	$usuario = $_SESSION['session_username'];

	// DELETE FROM  database
    $sql = "DELETE FROM  profesores WHERE id_profesor='$id_profesor'";
    $sqla = "INSERT INTO auditoria (usuario, fecha, accion, detalle) VALUES ('$usuario','$timestamp','Eliminar Profesor',(select concat (Apellido,',',Nombre) from profesores where id_profesor = '$id_profesor'))";

    $query = mysqli_query($con,$sqla);
    // if product has been added successfully
    if ($query) {
    	$audit = mysqli_query($con, $sql);
        $messages[] = "El profesor ha sido eliminado con éxito.";
    } else {
        $errors[] = "Lo sentimos, la eliminación falló. Por favor, regrese y vuelva a intentarlo.";
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
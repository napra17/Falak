<?php 
require ("../conexion.php");
$sql ="SELECT * from profesores";
$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profesores</title>
</head>
<body>
	<form action="reportes/getaprof.php" method="post">
<label>Seleccionar Clase:</label>
		<select name="id">
			<option value="*">Todos</option>
			<?php 
			while($row = mysqli_fetch_array($result)){
			$id_prof = $row["id_profesor"];
			$nombre = $row["Apellido"].', '.$row["Nombre"];
			 echo '<option value='.$id_prof. '>'.$nombre.'</option>';
			}
			 ?>						
		</select>&nbsp&nbsp&nbsp&nbsp&nbsp



<button type="submit">Exportar a Excel</button>
</form>
</body>
</html>

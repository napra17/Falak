<?php 
require ("../conexion.php");
$sql ="SELECT * from clases";
$result = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Alumnos por clase</title>
</head>
<body>
	<form action="reportes/getalumnos.php" method="post">
<label>Seleccionar Clase:</label>
		<select name="clase">
			<option value="*">Todas</option>
			<?php 
			while($row = mysqli_fetch_array($result)){
			$clase = $row["Nombre"];
			 echo '<option value='.$clase. '>'.$clase.'</option>';
			}
			 ?>						
		</select>&nbsp&nbsp&nbsp&nbsp&nbsp



<button type="submit">Exportar a Excel</button>
</form>
</body>
</html>

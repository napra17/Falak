<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagos por Mes</title>
</head>
<body>
	<form action="reportes/getdeuda.php" method="post">
		<h4>Exportar por Periodo</h4>
		<label>Seleccionar Mes:</label>
		<select name="mes">
			
			<option value="1">Enero</option>
			<option value="2">Febrero</option>
			<option value="3">Marzo</option>
			<option value="4">Abril</option>
			<option value="5">Mayo</option>
			<option value="6">Junio</option>
			<option value="7">Julio</option>
			<option value="8">Agosto</option>
			<option value="9">Septiembre</option>
			<option value="10">Octubre</option>
			<option value="11">Noviembre</option>
			<option value="12">Diciembre</option>
								
		</select>
		&nbsp&nbsp&nbsp&nbsp&nbsp
<label>Seleccionar Año:</label>
		<select name="anio">
			
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			
								
		</select>
		&nbsp&nbsp&nbsp&nbsp&nbsp

<button type="submit">Exportar a Excel</button>
</form><br>

<form action="reportes/getdeuda2.php" method="post">
		<h4>Exportar Anual de alumno</h4>
		<label>Seleccionar Alumno:</label>
		<select name="id">
			
			<?php
			require ("../conexion.php");
			$sql ="SELECT * from alumnos order by Apellido";
			$result = mysqli_query($con,$sql); 
			while($row = mysqli_fetch_array($result)){
			$id = $row["id_alumno"];
			$apellido = $row["Apellido"];
			$Nombre = $row["Nombre"];
			$display = $apellido. ', ' .$Nombre;
			 echo '<option value='.$id. '>'.$display.'</option>';
			}
			 ?>						
		</select>

		&nbsp&nbsp&nbsp&nbsp&nbsp

		<label>Seleccionar Periodo:</label>
		<select name="anio">
			
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
			<option value="2022">2022</option>
			
								
		</select>
		&nbsp&nbsp&nbsp&nbsp&nbsp

<button type="submit">Exportar a Excel</button>
</form><br>

</body>
</html>
<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagos por Mes</title>
</head>
<body>
	<form action="reportes/getpagos.php" method="post">
<label>Seleccionar Mes:</label>
		<select name="periodo">
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
								
		</select>&nbsp&nbsp&nbsp&nbsp&nbsp



<button type="submit">Exportar a Excel</button>
</form>
</body>
</html>
<?php 

?>
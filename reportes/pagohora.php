<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagos por Mes</title>
</head>
<body>
	<form action="reportes/gethoras.php" method="post">
<label>Fecha de inicio:</label>
<input type="date" name="fdesde">		

&nbsp&nbsp&nbsp&nbsp&nbsp

<label>Fecha de fin:</label>
<input type="date" name="fhasta">
&nbsp&nbsp&nbsp&nbsp&nbsp

<button type="submit">Exportar a Excel</button>
</form>
</body>
</html>
<?php 

?>
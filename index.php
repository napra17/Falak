	<?php 
	include ("menu.html");

	 ?>

	<!doctype html>
	<html>

	<head>
		<title>Panel de Control</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
		<link rel="stylesheet" href="bootstrap/css/material-icons.css">
		<link rel="stylesheet" href="bootstrap/css/fontawesome.min.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="js/jquery.min.js" ></script>
		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="css/custom.css">

	</head>

	<body>
	<div id="general">
	<div id="titulo">Pagos adeudados del Mes</div>
	<div id="panel1"></div>
	<div id="titulo">Margenes</div>
	<div id="panel2"></div>

</div>

	<script>
	$(document).ready(function(e){
		$('#panel1').load('graficos/pie.php', function(data){
			$(this).html(data);

		});
	});
	</script>
	<script>
	$(document).ready(function(e){
		$('#panel2').load('graficos/margenes.php', function(data1){
			$(this).html(data1);

		});
	});
	</script>


	</body>



	</html>

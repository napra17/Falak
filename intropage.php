	<?php 

	session_start();
	if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
	} else {
		session_set_cookie_params(0, "/", $HTTP_SERVER_VARS["HTTP_HOST"], 0); 

	if ($_SESSION['session_perfil'] = 'Administrador'){
		include ("menu_oper.html");
	}else{
		include ("menu.html");
	}	
	
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$mes =date(F);
	$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
 	$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
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
	<div id="titulo">Pagos adeudados de <?php echo $nombreMes	 ?></div>
	<div id="panel1"></div>
	<div id="titulo">Ingresos</div>
	<div id="panel2"></div>

	
</div>

<div id = "sidebar">
	<div id="titulo">Ultimos 3 meses</div>
	<div id="panel3"></div>
	<div id="titulo">Egresos</div>
	<div id="panel4"></div>

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
		<script>
	$(document).ready(function(e){
		$('#panel3').load('graficos/historial.php', function(data1){
			$(this).html(data1);

		});
	});
	</script>
	
		<script>
	$(document).ready(function(e){
		$('#panel4').load('graficos/egresos.php', function(data1){
			$(this).html(data1);

		});
	});
	</script>


	</body>
	


	</html>

<?php } ?>

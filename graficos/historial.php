<!doctype html>
<html>

<head>
	<title>Ultimos 3 meses</title>

</head>
<script src="Chart/Chart.bundle.js"></script>
<script src="Chart/samples/utils.js"></script>
<body>

<canvas id="densityChart" ></canvas>

	<script>
		var densityCanvas = document.getElementById("densityChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var densityData = {
  label: 'Deudores ultimos 3 meses',
  data: [
  <?php 
  include ("../conexion.php");
  $sql= "SELECT count(alumnos.id_alumno) total from alumnos
		where id_alumno not in (select id_alumno from pagos where mes = (select MONTH(CURDATE()) -1) and anio= (select YEAR(CURDATE())) and id_pago = 1)";
	$result = mysqli_query($con,$sql);
  	while ($row=mysqli_fetch_array($result)){

  	 ?>'<?php echo $row['total'] ?>',
  	<?php } ?>

  	<?php 
  include ("../conexion.php");
  $sql= "SELECT count(alumnos.id_alumno) total from alumnos
		where id_alumno not in (select id_alumno from pagos where mes = (select MONTH(CURDATE()) -2) and anio= (select YEAR(CURDATE())) and id_pago = 1)";
	$result = mysqli_query($con,$sql);
  	while ($row=mysqli_fetch_array($result)){

  	 ?>'<?php echo $row['total'] ?>',
  	<?php } ?>

  	<?php 
  include ("../conexion.php");
  $sql= "SELECT count(alumnos.id_alumno) total from alumnos
		where id_alumno not in (select id_alumno from pagos where mes = (select MONTH(CURDATE()) -3) and anio= (select YEAR(CURDATE())) and id_pago = 1)";
	$result = mysqli_query($con,$sql);
  	while ($row=mysqli_fetch_array($result)){

  	 ?>'<?php echo $row['total'] ?>',
  	<?php } ?>
 
  ],
  backgroundColor: [
    'rgba(0, 99, 132, 0.6)',
    'rgba(30, 99, 132, 0.6)',
    'rgba(60, 99, 132, 0.6)',
    'rgba(90, 99, 132, 0.6)',
    'rgba(120, 99, 132, 0.6)',
    'rgba(150, 99, 132, 0.6)',
    'rgba(180, 99, 132, 0.6)',
    'rgba(210, 99, 132, 0.6)',
    'rgba(240, 99, 132, 0.6)'
  ],
  borderColor: [
    'rgba(0, 99, 132, 1)',
    'rgba(30, 99, 132, 1)',
    'rgba(60, 99, 132, 1)',
    'rgba(90, 99, 132, 1)',
    'rgba(120, 99, 132, 1)',
    'rgba(150, 99, 132, 1)',
    'rgba(180, 99, 132, 1)',
    'rgba(210, 99, 132, 1)',
    'rgba(240, 99, 132, 1)'
  ],
  borderWidth: 2,
  hoverBorderWidth: 0
};

var chartOptions = {
  scales: {
    yAxes: [{
      barPercentage: 0.5
    }]
  },
  elements: {
    rectangle: {
      borderSkipped: 'left',
    }
  }
};
var barChart = new Chart(densityCanvas, {
  type: 'horizontalBar',
  data: {
    labels: [
    <?php 
    $fecha = date("d-m-Y");
    $fecha1= date("F",strtotime($fecha."- 1 month")); 
    $fecha2= date("F",strtotime($fecha."- 2 month")); 
    $fecha3= date("F",strtotime($fecha."- 3 month")); 
    ?>
    '<?php echo $fecha1 ?>',
    '<?php echo $fecha2 ?>',
    '<?php echo $fecha3 ?>',

    ],
    datasets: [densityData],
  },
  options: chartOptions
});
	</script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Margenes</title>
</head>
		<script src="Chart/Chart.min.js"></script>
		<script src="Chart/samples/utils.js"></script>
<body>
	<canvas id="speedChart"></canvas>
</body>
</html>

<script>
	var speedCanvas = document.getElementById("speedChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var speedData = {
  labels: [

  	<?php 
  	include ("../conexion.php");
  	$query = ("SELECT meses.Mes, sum(pagos.importe) total from pagos right join meses on pagos.mes = meses.id_mes where pagos.anio =YEAR(CURDATE())
			group by mes order by meses.id_mes");
  	$result = mysqli_query($con,$query);
  	while ($row=mysqli_fetch_array($result)){

  	 ?>'<?php echo $row['Mes'] ?>',
  	<?php } ?>

  ],
  datasets: [{
    label: "Total ($)",
    data: [
    <?php 

  	$sql = ("SELECT meses.Mes, sum(pagos.importe) total from pagos right join meses on pagos.mes = meses.id_mes
			where pagos.anio =YEAR(CURDATE()) group by mes order by meses.id_mes");
  	$result = mysqli_query($con,$sql);
    while ($row=mysqli_fetch_array($result)){

  	 ?>'<?php echo $row['total'] ?>',
  	<?php } ?>

    ],
  }]
};

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black'
    }
  }
};
var lineChart = new Chart(speedCanvas, {
  type: 'line',
  data: speedData,
  options: chartOptions
});
</script>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Margenes</title>
</head>
		<script src="Chart/Chart.min.js"></script>
		<script src="Chart/samples/utils.js"></script>
<body>
	<canvas id="speedCharter"></canvas>
</body>
</html>

<script>
	var speedCanvas = document.getElementById("speedCharter");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 16;

var speedData = {
  labels: [

  	<?php 
  	include ("../conexion.php");
  	$query = ("SELECT meses.Mes, sum(horas)
from horas inner join meses on meses.id_mes=MONTH(fecha)
where estado ='Pagado'
group by MONTH(fecha) order by meses.id_mes");
  	$result = mysqli_query($con,$query);
  	while ($row=mysqli_fetch_array($result)){

  	 ?>'<?php echo $row['Mes'] ?>',
  	<?php } ?>

  ],
  datasets: [{
    label: "Total Egresos ($)",
    data: [
    <?php 

  	$sql = ("SELECT meses.Mes, sum(horas) * 150 horas  
from horas inner join meses on meses.id_mes=MONTH(fecha)
where estado ='Pagado'
group by MONTH(fecha) order by meses.id_mes");
  	$result = mysqli_query($con,$sql);
    while ($row=mysqli_fetch_array($result)){

  	 ?>'<?php echo $row['horas'] ?>',
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
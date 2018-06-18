<?php 
include ("menu.html");

 ?>

<!doctype html>
<html>

<head>
	<title>Pie Chart</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="bootstrap/css/material-icons.css">
	<link rel="stylesheet" href="bootstrap/css/fontawesome.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<script src="Chart/Chart.bundle.js"></script>
	<script src="Chart/samples/utils.js"></script>
</head>

<body>
	    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
            <h2>Pagos Adeudados <b>Mes actual</b></h2>
          </div>
      </div></div>

	<div id="canvas-holder" style="width:40%; margin-left:300px; margin-top: 50px">
		<canvas id="chart-area"></canvas>
	</div>
	<!--<button id="randomizeData">Randomize Data</button>
	<button id="addDataset">Add Dataset</button>
	<button id="removeDataset">Remove Dataset</button>-->
	<script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						<?php 
						require ("conexion.php");
						$query = "SELECT count(id_asigna) - (select count(id_pagos) from pagos where mes = 5) 	  Adeudan, (select count(id_pagos) from pagos where mes = 5) Pagados
							from asigna_clase";
						$result = mysqli_query($con, $query);
						while ($row = mysqli_fetch_array($result)) 
						{
						?> '<?php echo $row["Pagados"] ?>',
						'<?php echo $row["Adeudan"] ?>',

						<?php
						}

						 ?>
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Pagados',
					'Adeudan',

				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>

</html>

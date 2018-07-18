		
<!DOCTYPE html>
<html>

<body>

		<script src="Chart/Chart.bundle.js"></script>
		<script src="Chart/samples/utils.js"></script>

		<div id="canvas-holder">
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
							require ("../conexion.php");
							$query = "select count(id_alumno) Adeudan, (select count(id_alumno) from pagos where mes=MONTH(CURDATE())) Pagados 
								from alumnos 
								where id_alumno not in (select id_alumno from pagos where mes=MONTH(CURDATE()));";
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
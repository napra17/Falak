<?php 
include ("menu.html");
 ?>

 <!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Reportes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    

  
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="bootstrap/css/material-icons.css">
<link rel="stylesheet" href="bootstrap/css/fontawesome.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">


  
</head>

<body>
	<script type="text/javascript" src="js/jquery.min.js" ></script>
<link rel="stylesheet" href="css/repor.css">
<div id="wrapper">
	<h1>Reportes</h1>
	<ul class="nav">
		<li class="hm">
			<img class="icon" src="icons/pagos.png" alt="">
			<span>Pagos</span>
		</li>
		<li class="fb">
			<img class="icon" src="icons/alumnos.png" alt="">
			<span>Alumnos</span>
		</li>
		<li class="gp">
			<img class="icon" src="https://cdn3.iconfinder.com/data/icons/picons-social/57/40-google-plus-24.png" alt="">
			<span>Google-plus</span>
		</li>
		<li class="tw">
			<img id="icon" class="icon" src="https://cdn0.iconfinder.com/data/icons/typicons-2/24/social-twitter-24.png" alt="">
			<span>Twitter</span>
		</li>
		<li class="cl">
			<img class="icon" src="https://cdn0.iconfinder.com/data/icons/typicons-2/24/phone-24.png" alt="">
			<span>Call</span>
		</li>
	</ul>
</div>
<div id="tabla">
	
</div>
</body>
<script>
	$(document).ready(function() {
	$(".hm").click(function(event) {
	$("#tabla").load('reportes/pagospormes.php');
	});
});;
</script>

</html>
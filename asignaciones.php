<?php

session_start();
	if(!isset($_SESSION["session_username"])) {
	header("location:index.php");
	} else {
		
	if ($_SESSION['session_perfil'] == 'Administrador'){
		include ("menu.php");
	}else{
		include ("menu_oper.php");
	}
include ("conexion.php");

$alumno = $_GET["id"];


$query = "SELECT * from alumnos where id_alumno = '".$alumno."'";
$lee_alumn = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($lee_alumn)) {
	$Nombre = $row["Nombre"];
	$id = $row["id_alumno"];
	$apellido = $row["Apellido"];
}
echo '    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">';	
	  
     
echo '<h2 class="text-left">Asignar Clase a <b>'.$Nombre.' '.$apellido. '</b></h2>';
echo '</div>';
$consulta = "select clases.nombre from clases inner join asigna_clase on clases.id_clase = asigna_clase.id_clase where asigna_clase.id_alumno= '".$alumno."'";

$lee = mysqli_query($con, $consulta);
while ($row = mysqli_fetch_array($lee)) {
	$Nombre = $row["nombre"];

echo '<div> Cursa:'.$Nombre. '</div>';
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Asignacion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    

  
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="bootstrap/css/material-icons.css">
<link rel="stylesheet" href="bootstrap/css/fontawesome.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">

  
</head>

<body>
	

	<div class="center">


<?php 
$clases = "select clases.nombre, clases.id_clase from clases 
where clases.id_clase not in 
(select asigna_clase.id_clase from asigna_clase where asigna_clase.id_alumno = '".$alumno."')";

$asigna = "select clases.nombre from clases inner join asigna_clase on clases.id_clase = asigna_clase.id_clase where id_alumno = '".$alumno."'";

$lee_clase = mysqli_query($con, $clases);

while ($row = mysqli_fetch_array($lee_clase)) {
	$Nombre = $row["nombre"];
	$id_clase = $row["id_clase"];

	echo '<form action="ajax/insert_asigna.php" method="post">';

	echo "<label>";

		echo "<input type='checkbox' name='clase[]' value=".$id_clase.">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$Nombre."</label>
				<br>";
	
	

}

echo "<input type='text' hidden='true' name='id_alumno' value=".$id.">";



?>		
	<br><br>
	
	<input class="btn btn-success" type='submit' name='submit' value='Guardar'/>
	</form>
	</div>
</body>


</html>

<?php } ?>
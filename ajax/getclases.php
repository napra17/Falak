<?php
	require ('../conexion.php');
	
	$id_alumno = $_POST['id_alumno'];

	
	$queryM = "SELECT clases.id_clase, clases.Nombre from asigna_clase
	inner join clases on clases.id_clase = asigna_clase.id_clase WHERE id_alumno = '$id_alumno'";
	$resultadoM = mysqli_query($con, $queryM);

	
	$html= "<option value='0'>Seleccionar Clase</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['id_clase']."'>".$rowM['Nombre']."</option>";
	}

		
	echo $html;
	
?>
<?php
	require ('../conexion.php');
	
	//Declaro Variables
	$hoy = date(d);
	$id_alumno = $_POST['id_alumno'];

	//Consulto valores de descuentos

	$sql_descuento = "SELECT porcentaje from descuentos where id = 4 and descripcion = 'Modalidad Multiple'";
	$result = mysqli_query($con, $sql_descuento);
	$imp_descuento = mysqli_fetch_array($result);
	$descuento = $imp_descuento['porcentaje'];

	//Consulto valores de cuotas

	$sql_cuota = "SELECT porcentaje from descuentos where id = 2 and descripcion = 'Cuota Mensual'";
	$result_c = mysqli_query($con, $sql_cuota);
	$imp_cuota = mysqli_fetch_array($result_c);
	$cuota = $imp_cuota['porcentaje'];

	//Consulto valores de recargos

	$sql_recargo = "SELECT porcentaje from descuentos where id = 3";
	$result_r = mysqli_query($con, $sql_recargo);
	$imp_recargo = mysqli_fetch_array($result_r);
	$recargo = $imp_recargo['porcentaje'];

		//Consulto valores de recargos

	$sql_inscripcion = "SELECT porcentaje from descuentos where id = 1 and descripcion = 'Inscripcion'";
	$result_i = mysqli_query($con, $sql_inscripcion);
	$imp_inscripcion = mysqli_fetch_array($result_i);
	$inscripcion = $imp_inscripcion['porcentaje'];

	//Consulto Clases por Alumno

	$sql_clases = "SELECT clases.id_clase, clases.Nombre from asigna_clase
	inner join clases on clases.id_clase = asigna_clase.id_clase WHERE id_alumno = '$id_alumno'";
	$resultadoM = mysqli_query($con, $sql_clases);
	
	//cuento cantidad de clases

	$row_cnt = mysqli_num_rows($resultadoM);

	if ($row_cnt > 1) {
		$sumacuota = $cuota * $row_cnt
		$totalcuota = $sumacuota - ($sumacuota * $descuento / 100);
		$totaldescuento = $sumacuota * $descuento / 100;

		if ($hoy > 15){
		$totalcuota = $sumacuota + ($sumacuota * $recargo / 100);
		$totalrecargo = $sumacuota * $recargo / 100;
		}
	}


		
?>
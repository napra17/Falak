<?php
	require ('../conexion.php');
	
	$id_alumno = $_POST['id_alumno'];

	//consulto monto de cuota
	$sql_cuota = "SELECT porcentaje from descuentos where id = 2";
	$resultc = mysqli_query($con, $sql_cuota);
	$cuota = mysqli_fetch_array($resultc);
	$cuotas = $cuota['porcentaje'];
	//fin consulta de cuotas

	//consulta de clases

	$queryM = "SELECT clases.id_clase, clases.Nombre from asigna_clase
	inner join clases on clases.id_clase = asigna_clase.id_clase WHERE id_alumno = '$id_alumno'";
	$resultadoM = mysqli_query($con, $queryM);
	$hoy = date(d);
	if ($hoy > 15){
		$sqlr = "SELECT porcentaje from descuentos where id = 3";
		$resulr = mysqli_query($con,$sqlr);
		$row = mysqli_fetch_array($resulr);
		$add = $row['porcentaje'];

	}

	$row_cnt = mysqli_num_rows($resultadoM);
	//consulto el importe a pagar, cuota menos descuentos
	if ($row_cnt > 1) {
		$cuotas = $cuotas * $row_cnt;
		$q_desc = "SELECT porcentaje from descuentos where id = 4 and descripcion = 'Modalidad Multiple'";
		$resuld = mysqli_query($con, $q_desc);
		$fila = mysqli_fetch_array($resuld);
		$descuento = $fila['porcentaje'];
		$recargo = $cuotas * $add / 100;
		$porcentaje = $cuotas * $descuento / 100;
		$apagar = $cuotas - $porcentaje + $recargo;
		$apagar2 = "<label>Total a Pagar</label>
		<input type='number' size='4' name='precio' id='precio' maxlength='4' value='".$apagar."'</input><br><br>";
		$tabla = "<br><table class='table table-striped table-hover'>
				 <tr>
				 <thead>
				 <th>Detalle</th>
				 <th>Importe</th>
				 </thead>
				 </tr>
				 <tr>
				 <td>Cuotas</td>
				 <td style='color:blue'>$".$cuotas."</td>
				 </tr>
				 <tr>
				 <td>Descuentos</td>
				 <td style='color:red'>-$".$porcentaje."</td>
				 </tr>
				 <tr>
				 <td>Recargos</td>
				 <td>$".$recargo."</td>
				 </tr>
				 </table>";

	}else if ($row_cnt == 1){
		$recargo = $cuotas * $add / 100;
		$apagar = $cuotas + $recargo;
		$tabla = "<br><table class='table table-striped table-hover'>
				 <tr>
				 <thead>
				 <th>Detalle</th>
				 <th>Importe</th>
				 </thead>
				 </tr>
				 <tr>
				 <td>Cuotas</td>
				 <td style='color:blue'>$".$cuotas."</td>
				 </tr>
				 <tr>
				 <td>Recargos</td>
				 <td>$".$recargo."</td>
				 </tr>
				 </table>";
		$apagar2 = "<br><label>Total a Pagar:</label>
		<input type='number' size='4' name='precio' id='precio' maxlength='4' value='".$apagar."'required></input><br><br>";

	}else{

		$sql = "SELECT porcentaje from descuentos where id = 1 and descripcion = 'Inscripcion'";
		$resul = mysqli_query($con, $sql);
		$registro = mysqli_fetch_array($resul);
		$inscripcion = $registro['porcentaje'];
		$tabla = "<br><table class='table table-striped table-hover'>
				 <tr>
				 <thead>
				 <th>Detalle</th>
				 <th>Importe</th>
				 </thead>
				 </tr>

				 <tr>
				 <td>Inscripcion</td>
				 <td>$".$inscripcion."</td>
				 </tr>
				 </table>";
		$apagar2 = "<br><label>Total a Pagar:</label>
		<input type='number' size='4' name='precio' id='precio' maxlength='4' value='".$inscripcion."'required></input><br><br>";
		
		//$apagar2 = "<label>'".$Inscripcion."'</label><br><br>";
	}
	
	$html= "<label>Cursa:</label>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<label><b>".$rowM['Nombre']."</label></b> ,";

	}
	
	echo $html;
	echo $tabla;
	echo $apagar2;
?>
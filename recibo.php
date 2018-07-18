<?php 
include ("conexion.php");
$id = $_GET["id"];

$sql = "SELECT pagos.id_pagos, alumnos.Apellido, alumnos.Nombre, pagos.importe, pagos.anio, pagos.fecha ,
CASE pagos.mes
When 1 THEN 'Enero'
When 2 THEN 'Febrero'
When 3 THEN 'Marzo'
When 4 THEN 'Abril'
When 5 THEN 'Mayo'
When 6 THEN 'Junio'
When 7 THEN 'Julio'
When 8 THEN 'Agosto'
When 9 THEN 'Septiembre'
When 10 THEN 'Octubre'
When 11 THEN 'Noviembre'
When 12 THEN 'Diciembre'
end as Mes
from pagos  left join
clases  on pagos.id_clase = clases.id_clase
inner join
alumnos  on pagos.id_alumno = alumnos.id_alumno where id_pagos = '".$id."'";

$stm = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($stm)){ 
$nombre=$row['Nombre'];
$apellido=$row['Apellido'];
$importe=$row['importe'];
$mes=$row['Mes'];
$anio=$row['anio'];
$fecha1=$row['fecha'];

}


require('fpdf181/fpdf.php');
$fecha =date("d/m/Y");


$pdf = new FPDF();
$header=array('Columna 1','Columna 2','Columna 3','Columna 4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Image('graficos/falak.jpg',180,8,20);
$pdf->Cell(0,20,'Instituto de Danzas FALAK',B,1,'C');
$pdf->SetFont('Courier','B',12);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(0,10,'Constancia de Pago de cuota',1,1,'C','true');
$pdf->SetFont('Courier','I',12);
$pdf->Cell(0,10,$fecha,0,1,'R');
$pdf->Cell(0,10,'Nombre y Apellido: '.$apellido.', '.$nombre,0,1);
$pdf->Cell(0,10,'--------------------------------------------------------------------------');
$pdf->Ln();
$pdf->Cell(110,10,'Recibo de pago correspondiente al periodo:',0,0,'L');
$pdf->SetFillColor(200,220,255);
$pdf->Cell(80,10,$mes.' / '.$anio,0,1,'L',true);
$pdf->Ln();
$pdf->SetFont('Courier','B',12);
$pdf->Cell(50,10,'Importe pagado:',0,0,'L');
$pdf->SetFillColor(200,220,255);
$pdf->Cell(40,10,'$'.$importe,0,1,'L',true);
$pdf->Ln();
$pdf->Cell(50,10,'Fecha de Pago:',0,0,'L');
$pdf->SetFillColor(200,220,255);
$pdf->Cell(40,10,$fecha1,0,1,'L',true);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0,10,'---------------------------',0,1,'C');
$pdf->Cell(0,10,'Instituto Falak',0,1,'C');
$pdf->Output();


?>



<?php  
$id_profesor = $_GET["id"];
$idmes = $_GET["mes"];
$anio = $_GET["anio"];

if ($idmes == 'Enero'){
	$mes = 1;
}elseif ($idmes == 'Febrero'){
	$mes = 2;
}elseif ($idmes == 'Marzo'){
	$mes = 3;
}elseif ($idmes == 'Abril') {
	$mes = 4;
}elseif ($idmes == 'Mayo'){
	$mes = 5;
}elseif ($idmes == 'Junio') {
	$mes = 6;
}elseif ($idmes == 'Julio') {
	$mes = 7;
}elseif ($idmes == 'Agosto') {
	$mes = 8;
}elseif ($idmes == 'Septiembre') {
	$mes = 9;
}elseif ($idmes == 'Octubre') {
	$mes = 10;
}elseif ($idmes == 'Noviembre') {
	$mes = 11;
}elseif ($idmes == 'Diciembre') {
	$mes = 6;
}

include ("../conexion.php");

$sql_horas="SELECT porcentaje from descuentos where tipo = 4";
$result_horas = mysqli_query($con,$sql_horas);
$v_hora = ($row=mysqli_fetch_array($result_horas));
$valor_hora = $row["porcentaje"];

$query = "SELECT Apellido, Nombre from profesores where id_profesor = $id_profesor";
$stm = mysqli_query($con, $query);

while ($prof = mysqli_fetch_array($stm)){
	$apellido = $prof['Apellido'];
	$nombre = $prof['Nombre'];
}

$sql ="SELECT horas.id_horas, horas.fecha, horas.horas, profesores.Apellido, profesores.Nombre,horas.estado 
from horas inner join profesores
on horas.id_profesor = profesores.id_profesor 
where horas.id_profesor = $id_profesor and MONTH(horas.fecha) = $mes and estado = 'Pendiente'";

$result = mysqli_query($con, $sql);


require('../fpdf181/fpdf.php');

$fecha =date("d/m/Y");
// Tabla simple

$pdf = new FPDF();
$header = array('ID','Fecha', 'Horas');
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Image('../graficos/falak.jpg',180,8,20);
$pdf->Cell(0,20,'Instituto de Danzas FALAK',B,1,'C');
$pdf->SetFont('Courier','B',12);
$pdf->SetFillColor(200,220,255);
$pdf->Cell(0,10,'Constancia de Pago de Horas Trabajadas',1,1,'C','true');
$pdf->SetFont('Courier','I',12);
$pdf->Cell(0,10,$fecha,0,1,'R');
$pdf->Cell(0,10,'Nombre y Apellido: '.$apellido.', '.$nombre,0,1);
$pdf->Cell(0,10,'--------------------------------------------------------------------------');
$pdf->Ln();
$pdf->Cell(110,10,'Recibo de pago correspondiente al periodo:',0,0,'L');
$pdf->SetFillColor(200,220,255);
$pdf->Cell(80,10,$idmes.' / '.$anio,0,1,'L',true);
$pdf->Ln();
$pdf->SetDrawColor(200,220,200);
$pdf->Cell(50,7,'ID',1,0,C);
$pdf->Cell(50,7,'Fecha',1,0,C);
$pdf->Cell(50,7,'Horas',1,0,C);
$pdf->Ln();
while ($row=mysqli_fetch_array($result)){
	$id = $row['id_horas'];
	$fecha = $row['fecha'];
	$horas = $row['horas'];
	$estado = $row['estado'];
	$tot+=($row['horas']);

	$modifica = "UPDATE horas set estado ='Pagado', f_pago=$fecha where id_horas = $id";
	$update = mysqli_query($con,$modifica);
	
$pdf->Cell(50,6,$id,1,0,C);
$pdf->Cell(50,6,$fecha,1,0,C);
$pdf->Cell(50,6,$horas,1,0,C);
$pdf->Ln();
}
 $total_hora = $valor_hora * $tot;
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Courier','B',12);
$pdf->Cell(50,10,'Importe pagado:',0,0,'L');
$pdf->SetFillColor(200,220,255);
$pdf->Cell(40,10,'$'.$total_hora,0,1,'L',true);
$pdf->Ln();

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(0,10,'---------------------------                ---------------------------',0,1,'C');
$pdf->Cell(0,10,'        Instituto Falak                               Profesor',0,1,'L');

$pdf->Output();

?>
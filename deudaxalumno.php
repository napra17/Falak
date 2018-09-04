<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Administracion de Alumnos Falak </title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="bootstrap/css/material-icons.css">
<link rel="stylesheet" href="bootstrap/css/fontawesome.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/custom.css">
</head>
<?php 
include("menu.html");
require_once ("conexion.php");
$id_alumno = $_GET["id"];
$anio = date(Y);
$sql = "SELECT Apellido, Nombre from alumnos where id_alumno = $id_alumno";
$stm = mysqli_query($con,$sql);
while ($row= mysqli_fetch_array($stm)){
  $nom = $row["Nombre"];
  $ape = $row["Apellido"];
  $display = $ape.', '.$nom;
}
?>

<body>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
            <h2>Estado de deuda de: <?php echo $display ?></h2>
          </div>
          </div>
          
          </div>



</body>
<div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr style="font-size: 12px">
            <th class='text-center'>Enero</th>
            <th class='text-center'>Febrero</th>
            <th class='text-center'>Marzo</th>
            <th class='text-center'>Abril</th>          
            <th class='text-center'>Mayo</th>
            <th class='text-center'>Junio</th>
            <th class='text-center'>Julio</th>
            <th class='text-center'>Agosto</th>
            <th class='text-center'>Septiembre</th>
            <th class='text-center'>Octubre</th>
            <th class='text-center'>Noviembre</th>
            <th class='text-center'>Diciembre</th>

            <th></th>
          </tr>
        </thead>
        <tbody> 
            <?php
              $query =  "SELECT mes from pagos where id_pago = 1 and anio = $anio and id_alumno= $id_alumno"; 
            $result = mysqli_query($con,$query);
            $mes = array();
            while ($row=mysqli_fetch_array($result)){          
              $registros[] = $row["mes"]; 
            }
            
            ?>  
              <tr class="<?php echo $text_class;?>">

              <?php 
              if ($registros){

               if (in_array(1, $registros)){
                echo "<td class='text-center'>Pagó</td>";
              }else{
                echo "<td class='text-center' style='background: red'>Debe</td>";
              }if (in_array(2, $registros)){
                echo "<td class='text-center'>Pagó</td>";
              }else{
                echo "<td class='text-center' style='background: red'>Debe</td>";
              }if (in_array(3, $registros)){
                echo "<td class='text-center'>Pagó</td>";
              }else{
                echo "<td class='text-center' style='background: red'>Debe</td>";
              }if (in_array(4, $registros)){
                echo "<td class='text-center'>Pagó</td>";
              }else{
                echo "<td class='text-center' style='background: red'>Debe</td>";
              }if (in_array(5, $registros)){
                echo "<td class='text-center'>Pagó</td>";
              }else{
                echo "<td class='text-center' style='background: red'>Debe</td>";
              }if (in_array(6, $registros)){
                echo "<td class='text-center'>Pagó</td>";
              }else{
                echo "<td class='text-center' style='background: red'>Debe</td>";
              }if (in_array(7, $registros)){
                echo "<td class='text-center'>Pagó</td>";
              }else{
                echo "<td class='text-center' style='background: red'>Debe</td>";
              }if (in_array(8, $registros)){
                echo "<td class='text-center'>Pagó</td>";
              }else{
                echo "<td class='text-center' style='background: red'>Debe</td>";
              }if (in_array(9, $registros)){
                echo "<td class='text-center'>Pagó</td>";
              }else{
                echo "<td class='text-center' style='background: red'>Debe</td>";
              }if (in_array(10, $registros)){
                echo "<td class='text-center'>Pagó</td>";
              }else{
                echo "<td class='text-center' style='background: red'>Debe</td>";
              }if (in_array(11, $registros)){
                echo "<td class='text-center'>Pagó</td>";
              }else{
                echo "<td class='text-center' style='background: red'>Debe</td>";
              }if (in_array(12, $registros)){
                echo "<td class='text-center'>Pagó</td>";
              }else{
                echo "<td class='text-center' style='background: red'>Debe</td>";
              }


               ?>          
             
              <td>
                
                <!--<a href='pago_deuda.php?id=<?php echo $id_alumno; ?>' class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Cobrar">local_atm</i></a>-->

                        </td>                          
            </tr>
          <?php } ?>
            </tbody>
          </table>
        </div>
</div></div>
   

</html>


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
$id_profesor = $_GET["id"];

$sql = "SELECT id_profesor, concat (profesores.Apellido,', ' ,profesores.Nombre) as displayname from profesores where id_profesor = '".$id_profesor."'";

$stm = mysqli_query($con, $sql);
while ($row=mysqli_fetch_array($stm)) {
  $profesor = $row["displayname"];
  $prof = $row["id_profesor"];
}

?>

<body>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
            <h2>Asignar Horas a: <b><?php echo $profesor ?></b></h2>
          </div>
          
                </div>
            </div>
      
      <div class='clearfix'></div>

<div class="table-responsive">
      <form action="ajax/asigna_horas.php" method="post">
        <label>Día</label>
        <input type="date" name="fecha">
        <label > Cantidad de Horas </label>
        <input size="4" type="numeric" name="horas">
        <input type="hidden" name="id" value="<?php echo $prof ?>"></input>
        <button type="submmit">Guardar</button>
      </form>
<br><br>
</div>
</body>
<div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th class='text-center'>ID</th>
            <th class='text-center'>Fecha</th>
            <th class='text-center'>Horas</th>       

            <th></th>
          </tr>
        </thead>
        <tbody> 
            <?php
              $query = "SELECT * from horas where id_profesor = $prof"; 
              $lee_alumn = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($lee_alumn)){ 
              $id=$row['id_horas'];
              $Fecha=$row['fecha'];
              $horas=$row['horas'];
             
             
            ?>  
            <tr class="<?php echo $text_class;?>">
              <td class='text-center'><?php echo $id;?></td>
              <td class='text-center'><?php echo $Fecha;?></td>
              <td class='text-center'><?php echo $horas;?></td>
            
             
              <td>
                
                <a href='html/delete_alumno.php?id=<?php echo $id; ?>' class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>

                        </td>                          
            </tr>
            <?php }?>

</script>
</html>

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
$clase = $_GET["id"];

$sql = "SELECT Nombre from clases where id_clase = '".$clase."'";

$query = "SELECT asigna_clase.id_asigna, alumnos.Apellido, alumnos.Nombre, alumnos.Categoria
from alumnos
inner join asigna_clase on alumnos.id_alumno = asigna_clase.id_alumno
where asigna_clase.id_clase = ".$clase." ";

$stm = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($stm)){ 
$curso=$row['Nombre'];}

?>

<body>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
            <h2>Alumnos inscriptos en <b><?php echo $curso?></b></h2>
          </div>
          
                </div>
            </div>
      
      <div class='clearfix'></div>

<div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th class='text-center'>ID</th>
            <th class='text-center'>Apellido</th>
            <th class='text-center'>Nombre</th>
            <th class='text-center'>Categoria</th>
            

            <th></th>
          </tr>
        </thead>
        <tbody> 
            <?php 
              $lee_alumn = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($lee_alumn)){ 
              $id_asigna=$row['id_asigna'];
              $apellido=utf8_encode($row['Apellido']);
              $nombre=$row['Nombre'];
              $categoria=$row['Categoria'];
             
            ?>  
            <tr class="<?php echo $text_class;?>">
              <td class='text-center'><?php echo $id_asigna;?></td>
              <td class='text-center'><?php echo $apellido;?></td>
              <td class='text-center'><?php echo $nombre;?></td>
              <td class='text-center'><?php echo $categoria;?></td>
             
              <td>
                
                <a href='html/delete_alumno.php?id=<?php echo $id_asigna; ?>' class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>

                        </td>                          
            </tr>
            <?php }?>



</body>


</script>
</html>


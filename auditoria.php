<?php   session_start();
  if(!isset($_SESSION["session_username"])) {
  header("location:index.php");
  } else {
    
  if ($_SESSION['session_perfil'] == 'Administrador'){
    $menu = 'menu.php';
  }else{
    $menu = 'menu_oper.php';
  } ?>

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
include($menu);
require_once ("conexion.php");
$clase = $_GET["id"];


$query = "SELECT * from auditoria order by fecha desc limit 15";

?>

<body>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
            <h2>Auditoria</h2>
          </div>
          
                </div>
            </div>
      
      <div class='clearfix'></div>

<div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th class='text-center'>ID</th>
            <th class='text-center'>Fecha y Hora</th>
            <th class='text-center'>Usuario</th>
            <th class='text-center'>Accion</th>
            <th class='text-center'>Detalle</th>
            

            <th></th>
          </tr>
        </thead>
        <tbody> 
            <?php 
              $lee_alumn = mysqli_query($con, $query);
            while($row = mysqli_fetch_array($lee_alumn)){ 
              $id=$row['id'];
              $usuario=utf8_encode($row['usuario']);
              $fecha=$row['fecha'];
              $accion=$row['accion'];
              $detalle=$row['detalle'];
             
            ?>  
            <tr class="<?php echo $text_class;?>">
              <td class='text-center'><?php echo $id;?></td>
              <td class='text-center'><?php echo $usuario;?></td>
              <td class='text-center'><?php echo $fecha;?></td>
              <td class='text-center'><?php echo $accion;?></td>
              <td class='text-center'><?php echo $detalle;?></td>
             
                                   
            </tr>
            <?php }?>



</body>


</script>
</html>
<?php } ?>

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
<body>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
            <h2>Administrar <b>Pagos</b></h2>
          </div>
          <div class="col-sm-6">
            <a href="#addProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Ingresar pago</span></a>
          </div>
                </div>
            </div>
      <div class='col-sm-4 pull-right'>
        <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" onclick="load(1);">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                </div>
      </div>
      <div class='clearfix'></div>
      <hr>
      <div id="loader"></div><!-- Carga de datos ajax aqui -->
      <div id="resultados"></div><!-- Carga de datos ajax aqui -->
      <div class='outer_div'></div><!-- Carga de datos ajax aqui -->
            
      
        </div>
    </div>
  <!-- Menu Vertical HTML -->
  <?php include($menu);?>
  <!-- Edit Modal HTML -->
  <?php include("html/pago_hora_add.php");?>
  <!-- Edit Modal HTML -->
  <?php include("html/pago_hora_edit.php");?>
  <?php include("html/pago_hora_delete.php");?>

  <script src="js/script_pago_horas.js"></script>
</body>
</html>
<?php } ?>
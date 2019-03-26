<?php 
session_start();
$usuario = $_SESSION['session_username'];
$perfil = $_SESSION['session_perfil'];
 ?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<!-- body has the class "cbp-spmenu-push" -->
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" />
        <!--<link rel="stylesheet" type="text/css" href="css/style.css" />-->
    </head>
<div id="menu">
    
    <?php echo "<h3>Bienvenido $usuario</h3>"; ?>
    
<ul>
    <li class="has-sub"><a href="index.php">Inicio</a>
        <li class="has-sub"><a href="clases.php">Clases</a>
            <li class="has-sub"><a href="alumnos.php">Alumnos</a>
                <li class="has-sub"><a href="#">Administracion</a>
                <ul>
                    <li><a href="config_pagos.php">Configuracion</a></li>
                    <li><a href="usuarios.php">Usuarios</a></li>
                    <li><a href="pagos.php">Pagos</a></li>
                    <li><a href="auditoria.php">Auditoria</a></li>
                </ul>
             </li>
          <li><a href="profesores.php">Profesores</a></li>
          <li><a href="reportes.php">Reportes</a></li>
          <li><a href="logout.php">Salir</a></li>
</ul>
   
  
</div>
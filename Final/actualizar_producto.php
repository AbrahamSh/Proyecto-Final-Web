<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?// require('estilo.php');?>
    <title>Producto actualizado</title>
</head>
<body>
<? //require('navtab.php');?>
    <div class="container" style="margin-top:200px"> -->
<?php
session_start();

$con = mysqli_connect("localhost","root","root","tienda");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();    
  }
  $id = mysqli_real_escape_string($con, $_SESSION['id_producto']);
  //echo  $_SESSION['id_producto'];
  $nombre = mysqli_real_escape_string($con, $_SESSION['nombre']);
  //echo $nombre;
  $descripcion = mysqli_real_escape_string($con,$_SESSION['descripcion']);
 // echo $descripcion;
 
  $precio = mysqli_real_escape_string($con,$_SESSION['precio']);
 
  $cantidad= mysqli_real_escape_string($con,$_SESSION['cantidad']);

  $fabricante = mysqli_real_escape_string($con,$_SESSION['fabricante']);
  
  $origen = mysqli_real_escape_string($con,$_SESSION['origen']);

  $editorial = mysqli_real_escape_string($con,$_SESSION['editorial']);
  


  $insert="UPDATE productos set nombre='$nombre' , descripcion='$descripcion',  precio=$precio, cantidad=$cantidad ,fabricante='$fabricante', origen='$origen',editorial='$editorial'where id_producto=$id;";

if (!mysqli_query($con,$insert)) {
    die('Error: ' . mysqli_error($con));
  }
  

  mysqli_close($con);

  header('Location:tabla_productos.php');

?>
<!-- <div class="alert alert-success">
  <strong>Se guardaron existosamente los cambios</strong> 
</div>
<input type="button"  class="btn btn-info btn-lg" onclick="window.location='tabla_productos.php'" value="Ver tabla de los productos">
</body>
</div>
</html> -->
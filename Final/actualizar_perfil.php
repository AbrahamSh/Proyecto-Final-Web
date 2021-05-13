<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<? require('estilo.php');?>
    <title>Producto actualizado</title>
</head>
<body>
<? require('navtab.php');?> -->
    <!-- <div class="container" style="margin-top:200px"> -->
<?php
session_start();

$con = mysqli_connect("localhost","root","root","tienda");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();    
  }
session_start();
$correo=$_SESSION['correo'];

  $nombre = mysqli_real_escape_string($con, $_SESSION['nombre']);
 
  $fecha = mysqli_real_escape_string($con,$_SESSION['fecha']);
 
  $cp = mysqli_real_escape_string($con,$_SESSION['cp']);
 
  $direccion= mysqli_real_escape_string($con,$_SESSION['direccion']);

  $ciudad = mysqli_real_escape_string($con,$_SESSION['ciudad']);
  
  $estado = mysqli_real_escape_string($con,$_SESSION['estado']);

  $pais = mysqli_real_escape_string($con,$_SESSION['pais']);
  


  $insert="UPDATE usuarios set nombre='$nombre' , fecha_nacimiento='$fecha',  cp='$cp', direccion='$direccion' ,ciudad='$ciudad', estado='$estado',pais='$pais'where correo='$correo';";

if (!mysqli_query($con,$insert)) {
    die('Error: ' . mysqli_error($con));
  }
  

  mysqli_close($con);
  header('Location:perfil.php');


?>
<!-- <div class="alert alert-success">
  <strong>Se guardaron existosamente los cambios</strong> 
</div> -->
<!-- 
<input type="button"  class="btn btn-info btn-lg" onclick="window.location='tabla_productos.php'" value="Ver tabla de los productos">
</body>
</div>
</html> -->
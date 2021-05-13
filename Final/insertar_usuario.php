<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? //require('estilo.php');?>
    <title>Usuario</title>
</head>
<body>
    <div class="container"> -->
<?php
session_start();

$con = mysqli_connect("localhost","root","root","tienda");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();    
  }
  $nombre = mysqli_real_escape_string($con, $_SESSION['nombre']);
   
  $correo = mysqli_real_escape_string($con,$_SESSION['correo']);

  $passwd = mysqli_real_escape_string($con,$_SESSION['passwd']);
 
  $fecha = mysqli_real_escape_string($con,$_SESSION['fecha']);
 
  $num_tar = mysqli_real_escape_string($con,$_SESSION['num_tar']);

  $cp = mysqli_real_escape_string($con,$_SESSION['cp']);
  
  $direccion = mysqli_real_escape_string($con,$_SESSION['direccion']);

  $ciudad = mysqli_real_escape_string($con,$_SESSION['ciudad']);

  $estado = mysqli_real_escape_string($con,$_SESSION['estado']);

  $pais = mysqli_real_escape_string($con,$_SESSION['pais']);


  

  $insert="INSERT INTO usuarios(nombre, correo, passwd, fecha_nacimiento, numero_tarjeta ,cp,direccion,ciudad,estado,pais)
   VALUES ('$nombre','$correo','$passwd','$fecha', '$num_tar', '$cp','$direccion','$ciudad','$estado','$pais');";
    
if (!mysqli_query($con,$insert)) {
    die('Error: ' . mysqli_error($con));
  }
  

  mysqli_close($con);
  session_destroy();
  session_start();
  $_SESSION['correo']=$correo;
  header('Location:index.php');
?>
<!-- <div class="alert alert-success">
  <strong>Se guardo existosamente los datos</strong> 
</div>
<table>
    <tr>
 <td><input type="button" class="btn btn-primary btn-lg" onclick="window.location='index.php'" value="Regresar"></td>
 <td><input type="button"  class="btn btn-info btn-lg" onclick="window.location='datos.php'" value="Ver tabla de datos"></td>
   </tr> 
</table>
</body>
</div>
</html> -->
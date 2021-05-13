<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Producto</title>
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
   
  $descripcion = mysqli_real_escape_string($con,$_SESSION['descripcion']);

  $foto=mysqli_real_escape_string($con,$_SESSION['foto']);
 
  $precio = mysqli_real_escape_string($con,$_SESSION['precio']);
 
  $cantidad= mysqli_real_escape_string($con,$_SESSION['cantidad']);

  $fabricante = mysqli_real_escape_string($con,$_SESSION['fabricante']);
  
  $origen = mysqli_real_escape_string($con,$_SESSION['origen']);

  $editorial = mysqli_real_escape_string($con,$_SESSION['editorial']);
  


  $insert="INSERT INTO productos(nombre, descripcion, foto, precio, cantidad ,fabricante, origen,editorial)
   VALUES ('$nombre','$descripcion','$foto',$precio,$cantidad, '$fabricante','$origen','$editorial');";
    
if (!mysqli_query($con,$insert)) {
    die('Error: ' . mysqli_error($con));
  }
  

  mysqli_close($con);
//   echo"<div class=\"container\"/ style=\"margin-top:80px\">";
//   echo "<div class=\"alert alert-success alert-dismissible fade show\">";
// echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
// echo "<strong>Guardo el producto correctamente</strong> </div>";
// echo"</div>";
//   include("index.php");
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
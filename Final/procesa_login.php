<!DOCTYPE html>
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
    <title>Login</title>
</head>
<body>
    <div class="container" style="margin-top:80px">
<?php

$con = mysqli_connect("localhost","root","root","tienda");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();    
  }

  $correo =$_POST['correo'];
  $passwd  =$_POST['passwd'];
  $query="select * from  usuarios where correo='$correo' and passwd='$passwd';";
    

 $resultado = mysqli_query($con,$query);
 $numero=mysqli_num_rows($resultado);
 
 if($numero!=1){
 
echo "<div class=\"alert alert-danger alert-dismissible fade show\">";
echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>";
echo "<strong>Usuario o contraseña inválidos</strong> </div>";
include("login.php");

  }else{
    session_start();
    $_SESSION['correo'] = $_POST['correo'];
   header('Location:index.php');
  }

  mysqli_close($con);
?>
</body>
</div>
</html>
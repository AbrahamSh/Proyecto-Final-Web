<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .error{
        color: Tomato;
    }
    </style>
    <?require('estilo.php');?>
    <title>Cambiar tarjeta</title>
</head>
<body>

    <?
    require('navtab.php');
     $bandera=1;
   $passwd = $passwd2 =  "";
     $Errpasswd = $Errpasswd2 =  "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["tarjeta"])){
            $Errnum_tar="El número de tarjeta es necesario";
            $bandera=1;
        }else{
            $tarjeta =test_input($_POST["tarjeta"]);
            $bandera=0;
            if(!preg_match("/^[0-9]{15,18}$/",$tarjeta)) {
              $Errnum_tar = "Número de tarjeta inválido";
              $bandera=1;
            }        
        }
        if(empty($_POST["passwdactual"])){
            $Errpasswdactual="La contraseña es necesaria para guardar los cambios";
            $bandera2=1;
        }else{
            $passwdactual = test_input($_POST["passwdactual"]);
            $con = mysqli_connect("localhost","root","root","tienda");
            //$passwdactual =$_POST['passwdactual'];
            session_start();
            $correo=$_SESSION['correo'];
            $query="select * from  usuarios where passwd='$passwdactual' and correo= '$correo';";
            $resultado = mysqli_query($con,$query);
            $numero=mysqli_num_rows($resultado);
            mysqli_close($con);      
            if($numero!=1){
                $Errpasswdactual= "Contraseña errónea";
                $bandera=1;
             }
            $bandera2=0;
    }


    }else{
   
      $con = mysqli_connect("localhost","root","root","tienda");
      //$passwdactual =$_POST['passwdactual'];
      session_start();
      $correo=$_SESSION['correo'];
      $query="select numero_tarjeta from  usuarios where correo= '$correo';";
      $resultado = mysqli_query($con,$query);
    while($row= mysqli_fetch_assoc($resultado)){
        $tarjeta=$row['numero_tarjeta'];
    }
}
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>
     <div class="container" style="margin-top:80px">
    <h1>Cambiar tarjeta</h1>
    <h3 class="error">*campos requeridos</h3>
    <form role="form" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
    <label for="passwd">Número de tarjeta:</label>
    <input type="number" class="form-control" name="tarjeta" id="tarjeta"  minlenght="15" maxlenght="18" value="<? echo $tarjeta;?>"><span class="error">*<?echo $Errnum_tar;?></span>
    </div>
    <div class="form-group">
    <label for="passwdactual">Contraseña:</label>
    <input type="password" class="form-control" name="passwdactual" id="passwdactual"  minlenght="8"  maxlenght="20" value="<? echo $passwdactual;?>"><span class="error">*<?echo $Errpasswdactual;?></span>
    </div>
    <div class="row">
    <div class="col"><input type="submit" class="btn btn-success btn-lg btn-block" value="Guardar datos"></div>
    <div class="col"><input type="button"  class="btn btn-info btn-lg btn-block" onclick="window.location='perfil.php'" value="Regresar"></div>
    </div>
    </form>
    </div>
    </div>
   <br>
    <?
      if($bandera==1 || $bandera2==1 || $bandera3==1 || $bandera4==1){
        
      }else{   
        $con = mysqli_connect("localhost","root","root","tienda");
       $query="update usuarios set  numero_tarjeta=$tarjeta where correo= '$correo';";
       $resultado = mysqli_query($con,$query);
       mysqli_close($con);      
        header('Location:perfil.php');

      }        
        
    ?>
</body>
</html>
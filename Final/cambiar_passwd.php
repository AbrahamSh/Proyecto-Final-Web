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
    <title>Cambiar contraseña</title>
</head>
<body>

    <?
    require('navtab.php');
     $bandera=1;
   $passwd = $passwd2 =  "";
     $Errpasswd = $Errpasswd2 =  "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       $passwd=$_POST['passwd'];
       $passwd2=$_POST['passwd2'];
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
                  
            if($numero!=1){
                $Errpasswdactual= "Contraseña errónea";
                $bandera=1;
             }
            $bandera2=0;
    if(empty($_POST["passwd"])){
        $Errpasswd="La contraseña es necesaria";
        $bandera3=1;
    }else{
        $passwd = test_input($_POST["passwd"]);
        $bandera3=0;
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/",$passwd)) {
          $Errpasswd = "La contraseña debe de tener por lo menos una letra mayúscula, una minúscula, un caracter especial y un número, debe ser de 8-20 dígitos";
          $bandera=1;
        }
    if(empty($_POST["passwd2"])){
        $Errpasswd2="Vuelva a escribir la contraseña";
        $bandera4=1;
    }else{
        $passwd2 = test_input($_POST["passwd2"]);
        $bandera4=0;
        if ($passwd!=$passwd2) {
          $Errpasswd2 = "La contraseña no coincide";
          $bandera=1;
        }else{
          $bandera=0;
        }
    }
    }
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
    <h1>Cambiar contraseña</h1>
    <h3 class="error">*campos requeridos</h3>
    <form role="form" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
    <label for="passwd">Contraseña:</label>
    <input type="password" class="form-control" name="passwd" id="passwd"  minlenght="8" maxlenght="20" value="<? echo $passwd;?>"><span class="error">*<?echo $Errpasswd;?></span>
    </div>
    <div class="form-group">
    <label for="passwd2">Repita la contraseña:</label>
    <input type="password" class="form-control" name="passwd2" id="passwd2"  minlenght="8"  maxlenght="20" value="<? echo $passwd2;?>"><span class="error">*<?echo $Errpasswd2;?></span>
    </div>
    <div class="form-group">
    <label for="passwdactual">Contraseña actual:</label>
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
          
       $query="update usuarios set  passwd='$passwd' where correo= '$correo';";
       $resultado = mysqli_query($con,$query);

        header('Location:perfil.php');

      }        
        
    ?>
</body>
</html>
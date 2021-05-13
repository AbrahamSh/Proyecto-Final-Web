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
    <title>Registro de  usuario</title>
</head>
<body>

    <?
    require('navtab.php');
     $bandera=1;
    $nombre = $correo = $passwd = $passwd2 = $fecha = $sitio = $cp =  $direccion = $ciudad = $pais = $estado= $num_tar = "";
    $Errnombre = $Errcorreo = $Errpasswd = $Errpasswd2 = $Errfecha = $Errcp = $Errdireccion = $Errciudad = $Errpais =  $Errestado = $Errnum_tar = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["nombre"])){
        $Errnombre="El nombre es necesario";
        $bandera=1;
    }else{
        $nombre = test_input($_POST["nombre"]);
        $bandera=0;
        if (!preg_match("/^(.[a-zA-Z ]{1,100})$/",$nombre)) {
            $Errnombre = "Tienes demasiados caracteres y  solo se permiten letras y espacios en blanco";
            $bandera=1;
        }
    }
    if(empty($_POST["correo"])){
        $Errcorreo="El correo es necesario";
        $bandera2=1;
    }else{
        $correo = test_input($_POST["correo"]);
        $bandera2=0;
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
          $Errcorreo = "Formato de correo inválido";
          $bandera=1;
        }
        $con = mysqli_connect("localhost","root","root","tienda");
        if (mysqli_connect_errno()) {
             echo "Failed to connect to MySQL: " . mysqli_connect_error();    
             }
        $correo =$_POST['correo'];
        $query="select * from  usuarios where correo='$correo' ;";
        $resultado = mysqli_query($con,$query);
        $numero=mysqli_num_rows($resultado);
              
        if($numero!=0){
            $Errcorreo = "El correo ya esta registrado";
            $bandera=1;
         }
    }
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
    }
    if(empty($_POST["passwd2"])){
        $Errpasswd2="Vuelva a escribir la contraseña";
        $bandera7=1;
    }else{
        $passwd2 = test_input($_POST["passwd2"]);
        $bandera7=0;
        if ($passwd!=$passwd2) {
          $Errpasswd2 = "La contraseña no coincide";
          $bandera=1;
        }
    }
    if(empty($_POST["fecha"])){
        $Errfecha="La fecha de nacimiento es necesaria";
        $bandera4=1;
    }else{
        $fecha = test_input($_POST["fecha"]);
        $bandera4=0;
        if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$fecha)){
            $bandera=1;
            $Errfecha="La fecha es incorrecta";
        }
    }
    if(empty($_POST["cp"])){
        $Errcp="El C.P. es necesario";
        $bandera5=1;
    }else{
        $cp= test_input($_POST["cp"]);
        $bandera5=0;
        if(!preg_match("/^[0-9]{5}$/",$cp)) {
          $Errcp = "Formato de  C.P. es inválido";
          $bandera=1;
        }        
    }
    if(empty($_POST["direccion"])){
        $Errdireccion="La dirección es necesaria";
        $bandera7=1;
    }else{
        $direccion= test_input($_POST["direccion"]);
        $bandera7=0; 
        if(!preg_match("/^(.{1,150})$/",$direccion)){
            $Errdireccion="La dirección es muy extensa";
            $bandera=1;
           }
    }
    if(empty($_POST["ciudad"])){
        $Errciudad="La ciudad es necesaria";
        $bandera8=1;
    }else{
        $ciudad= test_input($_POST["ciudad"]);
        $bandera8=0; 
        if(!preg_match("/^(.{1,50})$/",$ciudad)){
            $Errciudad="La ciudad es muy extensa";
            $bandera=1;
           }
    }
    if(empty($_POST["pais"])){
        $Errpais="El pais es necesario";
        $bandera9=1;
    }else{
        $pais= test_input($_POST["pais"]);
        $bandera9=0; 
        if(!preg_match("/^(.{1,100})$/",$pais)){
            $Errpais="El pais es muy extensa";
            $bandera=1;
           }
    }
    if(empty($_POST["estado"])){
        $Errestado="El estado es necesario";
        $bandera10=1;
    }else{
        $estado= test_input($_POST["estado"]);
        $bandera10=0; 
        if(!preg_match("/^(.{1,50})$/",$estado)){
            $Errestado="El estado es muy extensa";
            $bandera=1;
           }

    }
    if(empty($_POST["num_tar"])){
        $Errnum_tar="El número de tarjeta es necesario";
        $bandera6=1;
    }else{
        $num_tar= test_input($_POST["num_tar"]);
        $bandera6=0;
        if(!preg_match("/^[0-9]{15,18}$/",$num_tar)) {
          $Errnum_tar = "Número de tarjeta inválido";
          $bandera=1;
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
    <h1>Datos del usuario</h1>
    <h3 class="error">*campos requeridos</h3>
    <form role="form" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="<? echo $nombre;?>"><span class="error">*<?echo $Errnombre;?></span>
    </div>
    <div class="form-group">
    <label for="correo">Correo:</label>
    <input type="email" class="form-control" name="correo" id="correo" value="<? echo $correo;?>"><span class="error">*<?echo $Errcorreo;?></span>
    </div>
    <div class="form-group">
    <label for="passwd">Contraseña:</label>
    <input type="password" class="form-control" name="passwd" id="passwd"  minlenght="8" maxlenght="20" value="<? echo $passwd;?>"><span class="error">*<?echo $Errpasswd;?></span>
    </div>
    <div class="form-group">
    <label for="passwd2">Repita la contraseña:</label>
    <input type="password" class="form-control" name="passwd2" id="passwd2"  minlenght="8"  maxlenght="20" value="<? echo $passwd2;?>"><span class="error">*<?echo $Errpasswd2;?></span>
    </div>
    <div class="form-group">
    <label for="fecha">Fecha de nacimiento:</label>
    <input type="date"  class="form-control" name="fecha" id="fecha" value="<? echo $fecha;?>"><span class="error">*<?echo $Errfecha;?></span>
    </div>
    <div class="form-group">
    <label for="cp">Código Postal:</label>
    <input type="number" class="form-control" name="cp" id="cp" minlenght="5"  maxlenght="5" value="<? echo $cp;?>"><span class="error">*<?echo $Errcp;?></span>
    </div>
    <div class="form-group">
    <label for="direccion">Dirección:</label>
    <input type="text" class="form-control" name="direccion" id="direccion"  maxlenght="150" value="<? echo $direccion;?>"><span class="error">*<?echo $Errdireccion;?></span>
    </div>
    <div class="form-group">
    <label for="ciudad">Ciudad:</label>
    <input type="text" class="form-control" name="ciudad" id="ciudad"  maxlenght="50" value="<? echo $ciudad;?>"><span class="error">*<?echo $Errciudad;?></span>
    </div>
    <div class="form-group">
    <label for="estado">Estado:</label>
    <input type="text" class="form-control" name="estado" id="estado"  maxlenght="50" value="<? echo $estado;?>"><span class="error">*<?echo $Errestado;?></span>
    </div>
    <div class="form-group">
    <label for="pais">País:</label>
    <input type="text" class="form-control" name="pais" id="pais"  maxlenght="100" value="<? echo $pais;?>"><span class="error">*<?echo $Errpais;?></span>
    </div>
    <div class="form-group">
    <label for="num_tar">Número de tarjeta:</label>
    <input type="number" class="form-control" name="num_tar" id="num_tar" minlenght="15"  maxlenght="18" value="<? echo $num_tar;?>"><span class="error">*<?echo $Errnum_tar;?></span>
    </div>
    <div class="row">
    <div class="col"><input type="submit" class="btn btn-success btn-lg btn-block" value="Guardar datos"></div>
    <div class="col"><input type="button"  class="btn btn-info btn-lg btn-block" onclick="window.location='index.php'" value="Regresar"></div>
    </div>
    </form>
    </div>
    </div>
   <br>
    <?
      if($bandera==1 || $bandera2==1 || $bandera3==1 || $bandera4==1 || $bandera5==1 || $bandera6==1 || $bandera7==1  || $bandera8==1  || $bandera9==1  || $bandera10==1){

      }else{   
          
        session_start();
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['correo'] = $_POST['correo'];
        $_SESSION['passwd'] = $_POST['passwd'];
        $_SESSION['fecha'] = $_POST['fecha'];
        $_SESSION['cp'] = $_POST['cp'];
        $_SESSION['direccion'] = $_POST['direccion'];
        $_SESSION['ciudad'] = $_POST['ciudad'];
        $_SESSION['estado'] = $_POST['estado'];
        $_SESSION['pais'] = $_POST['pais'];
        $_SESSION['num_tar'] = $_POST['num_tar'];
        header('Location:insertar_usuario.php');



/*echo <<<EOL
<table>
<tr><th>Nombre</th><th>Correo</th><th>Edad</th><th>Fecha</th><th>Sitio Web</th><th>Género</th><th>Medio de contacto</th></tr>
<tr><td>$nombre</td><td>$correo</td><td>$edad</td><td>$fecha</td><td>$sitio</td><td>$genero</td><td>$listademedio</td></tr>
</table>
EOL;*/

//header('Location:insertar.php?nombre='.$_POST['nombre']."&correo=".$_POST['correo']."&edad=".$_POST['edad']."&fecha=".$_POST['fecha']."&sitio=".$_POST['sitio']."&genero=".$_POST['genero']."&medio=".$_POST['medio']);
//$nombre = $correo = $edad = $fecha = $sitio = $genero = $medio = "";
      }        
        
    ?>
</body>
</html>
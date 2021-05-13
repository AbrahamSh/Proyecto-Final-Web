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
    <title>Editar datos del usuario</title>
</head>
<body>

    <?
    require('navtab.php');
     $bandera=1;
     $nombre = $correo = $passwd = $passwd2 = $fecha = $sitio = $cp =  $direccion = $ciudad = $pais = $estado= $num_tar = "";
     $Errnombre = $Errcorreo = $Errpasswd = $Errpasswd2 = $Errfecha = $Errcp = $Errdireccion = $Errciudad = $Errpais =  $Errestado = $Errnum_tar = "";
     $conn = mysqli_connect("localhost","root","root","tienda");
     session_start();
     $correo=$_SESSION['correo'];
         $query = "SELECT id_usuario, nombre, fecha_nacimiento,cp,direccion,ciudad,estado, pais FROM usuarios where correo = '$correo'";
         $result = mysqli_query($conn, $query);
         if (mysqli_num_rows($result ) > 0) {
         while($row = mysqli_fetch_assoc($result)) { 
             $id=$row['id_usuario'];
            $nombre = $row['nombre'];
             $fecha = $row['fecha_nacimiento'];
             $cp = $row['cp'];
             $direccion = $row['direccion'];
             $ciudad = $row['ciudad'];
             $estado = $row['estado'];
             $pais= $row['pais'];;
         }}
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $fecha = $_POST['fecha'];
            $cp = $_POST['cp'];
            $direccion = $_POST['direccion'];
            $ciudad = $_POST['ciudad'];
            $estado = $_POST['direccion'];
            $pais = $_POST['pais'];
    
         }

    ?>
     <div class="container" style="margin-top:80px">
    <h1>Edite sus datos</h1>
    <h3 class="error">*campos requeridos</h3>
    <form role="form" method="post"  action="verifica_usuario.php">
    <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="<? echo $nombre;?>"><span class="error">*<?echo $_POST['Errnombre'];?></span>
    </div>
    <!-- <div class="form-group">
    <label for="correo">Correo:</label>
    <input type="email" class="form-control" name="correo" id="correo" value="<? echo $correo;?>"><span class="error">*<?echo  $_POST['Errcorreo'];?></span>
    </div> -->
    <div class="form-group">
    <label for="fecha">Fecha de nacimiento:</label>
    <input type="date"  class="form-control" name="fecha" id="fecha" value="<? echo $fecha;?>"><span class="error">*<?echo $_POST['Errfecha'];?></span>
    </div>
    <div class="form-group">
    <label for="cp">Código Postal:</label>
    <input type="number" class="form-control" name="cp" id="cp" minlenght="5"  maxlenght="5" value="<? echo $cp;?>"><span class="error">*<?echo $_POST['Errcp'];?></span>
    </div>
    <div class="form-group">
    <label for="direccion">Dirección:</label>
    <input type="text" class="form-control" name="direccion" id="direccion"  maxlenght="150" value="<? echo $direccion;?>"><span class="error">*<?echo $_POST['Errdireccion'];?></span>
    </div>
    <div class="form-group">
    <label for="ciudad">Ciudad:</label>
    <input type="text" class="form-control" name="ciudad" id="ciudad"  maxlenght="50" value="<? echo $ciudad;?>"><span class="error">*<?echo $_POST['Errciudad'];?></span>
    </div>
    <div class="form-group">
    <label for="estado">Estado:</label>
    <input type="text" class="form-control" name="estado" id="estado"  maxlenght="50" value="<? echo $estado;?>"><span class="error">*<?echo $_POST['Errestado'];?></span>
    </div>
    <div class="form-group">
    <label for="pais">País:</label>
    <input type="text" class="form-control" name="pais" id="pais"  maxlenght="100" value="<? echo $pais;?>"><span class="error">*<?echo $_POST['Errpais'];?></span>
    </div>
    <div class="form-group">
    <label for="passwd">Contraseña para confirmar cambios:</label>
    <input type="password" class="form-control" name="passwd" id="passwd"  minlenght="8" maxlenght="20" value="<? echo $passwd;?>"><span class="error">*<?echo $_POST['Errpasswd'];?></span>
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
      if($bandera==1 || $bandera2==1 || $bandera3==1 || $bandera4==1 || $bandera5==1 || $bandera6==1 || $bandera7==1  || $bandera8==1  || $bandera9==1  || $bandera10==1){

      }else{   
          
        // session_start();
        // $_SESSION['nombre'] = $_POST['nombre'];
        // $_SESSION['correo'] = $_POST['correo'];
        // $_SESSION['passwd'] = $_POST['passwd'];
        // $_SESSION['fecha'] = $_POST['fecha'];
        // $_SESSION['cp'] = $_POST['cp'];
        // $_SESSION['direccion'] = $_POST['direccion'];
        // $_SESSION['ciudad'] = $_POST['ciudad'];
        // $_SESSION['estado'] = $_POST['estado'];
        // $_SESSION['pais'] = $_POST['pais'];
        // $_SESSION['num_tar'] = $_POST['num_tar'];
        // header('Location:insertar_usuario.php');

      }        
        
    ?>
</body>
</html>
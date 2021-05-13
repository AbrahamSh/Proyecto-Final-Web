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
    <title>Registro de  producto</title>
</head>
<body>

    <?
    require('navtab.php');
     $bandera=1;
    $nombre = $descripcion = $foto =  $precio = $cantidad = $fabricante = $origen = $editorial= "";
    $Errnombre = $Errdescripcion = $Errfoto = $Errprecio = $Errcantidad = $Errfabricante = $Errorigen =  $Erreditorial="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["nombre"])){
        $Errnombre="El nombre es necesario";
        $bandera=1;
    }else{
        $nombre = test_input($_POST["nombre"]);
        $bandera=0;
    }
    if(empty($_POST["descripcion"])){
        $Errdescripcion="La descripción es necesaria";
        $bandera2=1;
    }else{
        $descripcion = test_input($_POST["descripcion"]);
        $bandera2=0;
        if(!preg_match("/^(.|[\s\S]{1,1000})$/",$descripcion)){
            $Errdescripcion="La descripción es muy larga";
            $bandera=1;
           }
    }
    $foto=$_FILES["foto"]["name"];
    $target_dir = "imagenes/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false) {
           $Errfoto.= " File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
            $Errfoto.= " El archivo no es una image.";
          $bandera3 = 1;
          $uploadOk = 0;
        }
      }
      if (file_exists($target_file)) {
        $Errfoto.=" El archivo ya existe.";
        $bandera3 = 1;
        $uploadOk = 0;
      }
      if ($_FILES["foto"]["size"] > 500000) {
        $Errfoto.= " El archivo es demasiado grande.";
        $bandera3 = 1;
        $uploadOk = 0;
      }
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
       $Errfoto.= " Solo se permite subir los siguientes tipo de imágenes JPG, JPEG, PNG & GIF.";
        $uploadOk = 0;
        $bandera3 = 1;
        }
    if(empty($_POST["precio"])){
        $Errprecio="El precio es necesario";
        $bandera4=1;
    }else{
        $precio = test_input($_POST["precio"]);
        $bandera4=0;
       if(!preg_match("/^\d{0,10}+(\.\d{0,2})?$/",$precio)){
        $Errprecio="El precio puede tener 10 dígitos y 2 decimales";
        $bandera=1;
       }
        if($precio<=0){
            $Errprecio="El precio debe ser mayor a 0";
            $bandera=1;
        }
    }
    if(empty($_POST["cantidad"])){
        $Errcantidad="La cantidad es necesaria";
        $bandera5=1;
    }else{
        $cantidad= test_input($_POST["cantidad"]);
        $bandera5=0;
        if($cantidad<0) {
          $Errcp = "La cantidad debe ser 0 o mayor";
          $bandera=1;
        }        
    }
    if(empty($_POST["fabricante"])){
        $Errfabricante="El autor es necesario";
        $bandera6=1;
    }else{
        $fabricante= test_input($_POST["fabricante"]);
        $bandera6=0;  
        if(!preg_match("/^(.{1,200})$/",$fabricante)){
            $Errfabricante="El autor es muy extenso";
            $bandera=1;
           }
    }
    if(empty($_POST["origen"])){
        $Errorigen="El idioma es necesario";
        $bandera7=1;
    }else{
        $origen= test_input($_POST["origen"]);
        $bandera7=0;  
        if(!preg_match("/^(.{1,200})$/",$origen)){
            $Errorigen="El idioma es muy extenso";
            $bandera=1;
           }
    }
    if(empty($_POST["editorial"])){
        $Erreditorial="La editorial es necesaria";
        $bandera8=1;
    }else{
        $editorial= test_input($_POST["editorial"]);
        $bandera8=0;  
        if(!preg_match("/^(.{1,100})$/",$editorial)){
            $Erreditorial="La editorial es muy extensa";
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
    <h1>Datos del producto</h1>
    <h3 class="error">*campos requeridos</h3>
    <form role="form" method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
    <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" name="nombre" id="nombre" maxlenght="100" value="<? echo $nombre;?>"><span class="error">*<?echo $Errnombre;?></span>
    </div>
    <div class="form-group">
    <label for="descripcion">Descripción:</label>
    <textarea  class="form-control" name="descripcion" id="descripcion"  maxlenght="500"><? echo $descripcion;?></textarea><span class="error">*<?echo $Errdescripcion;?></span>
    </div>
    <div class="form-group">
    <label for="foto">Fotografía del producto:</label>
    <input type="file" class="form-control-file" name="foto" id="foto"><span class="error">*<?echo $Errfoto;?></span>
    </div>
    <div class="form-group">
    <label for="precio">Precio:</label>
    <input type="number" class="form-control" name="precio" id="precio"  maxlenght="12"  step="any"   maxlenght="12" value="<? echo $precio;?>"><span class="error">*<?echo $Errprecio;?></span>
    </div>
    <div class="form-group">
    <label for="cantidad">Cantidad:</label>
    <input type="number"  class="form-control" name="cantidad" id="cantidad" maxlenght="11" value="<? echo $cantidad;?>"><span class="error">*<?echo $Errcantidad;?></span>
    </div>
    <div class="form-group">
    <label for="editorial">Editorial:</label>
    <input type="text" class="form-control" name="editorial" id="editorial"  maxlenght="200" value="<? echo $editorial;?>"><span class="error">*<?echo $Erreditorial;?></span>
    </div>
    <div class="form-group">
    <label for="fabricante">Autor:</label>
    <input type="text" class="form-control" name="fabricante" id="fabricante"  maxlenght="200" value="<? echo $fabricante;?>"><span class="error">*<?echo $Errfabricante;?></span>
    </div>
    <div class="form-group">
    <label for="origen">Idioma:</label>
    <input type="text" class="form-control" name="origen" id="origen"   maxlenght="100" value="<? echo $origen;?>"><span class="error">*<?echo $Errorigen;?></span>
    </div>
    <br>
    <div class="row">
    <div class="col"><input type="submit" class="btn btn-success btn-lg btn-block" value="Guardar datos"></div>
    <div class="col"><input type="button"  class="btn btn-info btn-lg btn-block" onclick="window.location='index.php'" value="Regresar"></div>
    </div>
    <!-- <input type="submit" class="btn btn-success btn-lg" value="Guardar datos">
    <input type="button"  class="btn btn-info btn-lg" onclick="window.location='index.php'" value="Regresar"> -->
    </form>
    </div>
    </div>
   <br>
    <?
      if($bandera==1 || $bandera2==1 || $bandera3==1 || $bandera4==1 || $bandera5==1 || $bandera6==1 || $bandera7==1 || $bandera8==1){
     
      }else{   
        session_start();
       if($_SESSION['correo']=='admin@thecomicbookstore.com'){
         move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
         $_SESSION['nombre'] = $_POST['nombre'];
         $_SESSION['descripcion'] = $_POST['descripcion'];
         $_SESSION['foto'] = $_FILES["foto"]["name"];
         $_SESSION['precio'] = $_POST['precio'];
         $_SESSION['cantidad'] = $_POST['cantidad'];
         $_SESSION['fabricante'] = $_POST['fabricante'];
         $_SESSION['origen'] = $_POST['origen'];
         $_SESSION['editorial'] = $_POST['editorial'];
        header('Location:insertar_producto.php');
      }
      }        
        
    ?>

</body>
</html>
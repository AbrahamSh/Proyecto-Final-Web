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
    <title>Editar producto</title>
</head>
<body>
  <?session_start();
     if($_SESSION['correo']=='admin@thecomicbookstore.com'){
    ?>
    <?
    require('navtab.php');
    $bandera=1;
    // $nombre = $descripcion = $foto =  $precio = $cantidad = $fabricante = $origen = $editorial= "";
    // $Errnombre = $Errdescripcion = $Errfoto = $Errprecio = $Errcantidad = $Errfabricante = $Errorigen =  $Erreditorial="";
    $conn = mysqli_connect("localhost","root","root","tienda");
    
	if(isset($_REQUEST['product']) && !empty($_REQUEST['product']) && is_numeric($_REQUEST['product']))
    {
        $id=$_REQUEST['product'];
        $query = "SELECT id_producto, nombre, precio,descripcion,origen,fabricante,cantidad,editorial FROM productos where id_producto = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result ) > 0) {
        while($row = mysqli_fetch_assoc($result)) { 
            $id=$row['id_producto'];
           $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $cantidad = $row['cantidad'];
            $fabricante = $row['fabricante'];
            $origen = $row['origen'];
            $editorial= $row['editorial'];;
        }}
        $_SESSION['id_producto']=$id;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $nombre= $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $fabricante = $_POST['fabricante'];
    $origen= $_POST['origen'];
    $editorial = $_POST['editorial'];
    }
   
    ?>
   
   <div class="container" style="margin-top:80px"> 
    <h1>Editar producto</h1>
    <h3 class="error">*campos requeridos</h3>
    <form role="form" method="post"  action="verifica_producto.php" enctype="multipart/form-data">

    <div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" name="nombre" id="nombre" maxlenght="100" value="<?echo $nombre;?>"><span class="error">*<?echo $_POST['Errnombre'];?></span>
    </div>
    <div class="form-group">
    <label for="descripcion">Descripción:</label>
    <textarea  class="form-control" name="descripcion" id="descripcion"  maxlenght="500"><? echo $descripcion;?></textarea><span class="error">*<?echo $Errdescripcion;?></span>
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
    <div class="col"><input type="button"  class="btn btn-info btn-lg btn-block" onclick="window.location='tabla_productos.php'" value="Regresar"></div>
    </div>
    <!-- <input type="submit" class="btn btn-success btn-lg"  value="Guardar datos">
    <input type="button"  class="btn btn-info btn-lg" onclick="window.location='tabla_productos.php'" value="Regresar"> -->
    </form>
    </div>
    </div>
   <br>
    <?
      if($bandera==1 || $bandera2==1 || $bandera3==1 || $bandera4==1 || $bandera5==1 || $bandera6==1 || $bandera7==1 || $bandera8==1){

      }else{   
         $_SESSION['nombre'] = $_POST['nombre'];
         $_SESSION['descripcion'] = $_POST['descripcion'];
         $_SESSION['precio'] = $_POST['precio'];
         $_SESSION['cantidad'] = $_POST['cantidad'];
         $_SESSION['fabricante'] = $_POST['fabricante'];
         $_SESSION['origen'] = $_POST['origen'];
         $_SESSION['editorial'] = $_POST['editorial'];
         header('Location:actualizar_producto.php');
      }        
        
    ?>
   <?}
    else{
      echo "Error 404";
    }
    
    ?>
</body>
</html>
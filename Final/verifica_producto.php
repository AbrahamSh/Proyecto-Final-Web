<?



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["nombre"])){
        $_POST['Errnombre']= $Errnombre="El nombre es necesario";
        $bandera=1;
    }else{
        $nombre = test_input($_POST["nombre"]);
        $_POST['nombre']=$nombre;
        $bandera=0;
    }
    if(empty($_POST["descripcion"])){
        $_POST['Errdescripcion'] = $Errdescripcion="La descripción es necesaria";
        $bandera2=1;
    }else{
        $descripcion = test_input($_POST["descripcion"]);
        $_POST['descripcion'] = $descripcion;
        $bandera2=0;
        if(!preg_match("/^(.|[\s\S]{1,1000})$/",$descripcion)){
            $Errdescripcion="La descripción es muy larga";
            $bandera=1;
           }
    }
    if(empty($_POST["precio"])){
        $_POST['Errprecio'] =  $Errprecio="El precio es necesario";
        $bandera4=1;
    }else{
        $precio = test_input($_POST["precio"]);
        $_POST['precio'] = $precio;
        $bandera4=0;
       if(!preg_match("/^\d{0,10}+(\.\d{0,2})?$/",$precio)){
        $_POST['Errprecio'] =  $Errprecio="El precio puede tener 10 dígitos y 2 decimales";
        $bandera=1;
       }
        if($precio<=0){
            $_POST['Errprecio'] =  $Errprecio="El precio debe ser mayor a 0";
            $bandera=1;
        }
    }
    if(empty($_POST["cantidad"]) && $_POST['cantidad']!=0){
        $_POST['Errcantidad'] = $Errcantidad="La cantidad es necesaria";
        $bandera5=1;
    }else{
        $cantidad= test_input($_POST["cantidad"]);
        $_POST['cantidad'] = $cantidad;
        $bandera5=0;
        if($cantidad<0) {
            $_POST['Errcantidad'] = $Errcantidad = "La cantidad debe ser 0 o mayor";
          $bandera=1;
        }        
    }
    if(empty($_POST["fabricante"])){
        $_POST['Errfabricante'] = $Errfabricante="El autor es necesario";
        $bandera6=1;
    }else{
        $fabricante= test_input($_POST["fabricante"]);
        $_POST['fabricante'] = $fabricante;
        $bandera6=0;  
        if(!preg_match("/^(.{1,200})$/",$fabricante)){
            $Errfabricante="El autor es muy extenso";
            $bandera=1;
           }
    }
    if(empty($_POST["origen"])){
        $_POST['Errorigen'] = $Errorigen="El idioma es necesario";
        $bandera7=1;
    }else{
        $origen= test_input($_POST["origen"]);
        $_POST['origen'] = $origen;
        $bandera7=0;  
        if(!preg_match("/^(.{1,200})$/",$origen)){
            $Errorigen="El idioma es muy extenso";
            $bandera=1;
           }
    }
    if(empty($_POST["editorial"])){
        $_POST['Erreditorial'] = $Erreditorial="La editorial es necesaria";
        $bandera8=1;
    }else{
        $editorial= test_input($_POST["editorial"]);
        $_POST['editorial'] = $editorial;
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
    if($bandera==1 || $bandera2==1 || $bandera3==1 || $bandera4==1 || $bandera5==1 || $bandera6==1 || $bandera7==1 || $bandera8==1){
        include('editar_producto.php');
    }else{
        session_start();
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
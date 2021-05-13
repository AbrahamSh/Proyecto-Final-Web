<? if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["nombre"])){
        $_POST['Errnombre']= $Errnombre="El nombre es necesario";
        $bandera=1;
    }else{
        $nombre = test_input($_POST["nombre"]);
        $_POST['nombre']=$nombre;
        $bandera=0;
        if (!preg_match("/^(.[a-zA-Z ]{1,100})$/",$nombre)) {
           $_POST['Errnombre'] = $Errnombre = "Tienes demasiados caracteres y  solo se permiten letras y espacios en blanco";
            $bandera=1;
        }
    }
    if(empty($_POST["passwd"])){
        $_POST['Errpasswd'] = $Errpasswd="La contraseña es necesaria para guardar los cambios";
        $bandera3=1;
    }else{
        $passwd = test_input($_POST["passwd"]);
        $con = mysqli_connect("localhost","root","root","tienda");
        if (mysqli_connect_errno()) {
             echo "Failed to connect to MySQL: " . mysqli_connect_error();    
             }
        $passwd =$_POST['passwd'];
        session_start();
        $correo=$_SESSION['correo'];
        $query="select * from  usuarios where passwd='$passwd' and correo= '$correo';";
        $resultado = mysqli_query($con,$query);
        $numero=mysqli_num_rows($resultado);
              
        if($numero!=1){
            $_POST['Errpasswd'] = $Errpasswd= "Contraseña errónea";
            $bandera=1;
         }
        $bandera3=0;
       
    }
    if(empty($_POST["fecha"])){
        $_POST['Errfecha'] = $Errfecha="La fecha de nacimiento es necesaria";
        $bandera4=1;
    }else{
        $fecha = test_input($_POST["fecha"]);
        $_POST['fecha'] = $fecha;
        $bandera4=0;
        if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$fecha)){
            $bandera=1;
            $Errfecha="La fecha es incorrecta";
        }
    }
    if(empty($_POST["cp"])){
        $_POST['Errcp'] =  $Errcp="El C.P. es necesario";
        $bandera5=1;
    }else{
        $cp= test_input($_POST["cp"]);
        $_POST['cp'] = $cp;
        $bandera5=0;
        if(!preg_match("/^[0-9]{5}$/",$cp)) {
            $_POST['Errcp'] = $Errcp = "Formato de  C.P. es inválido";
          $bandera=1;
        }        
    }
    if(empty($_POST["direccion"])){
        $_POST['Errdireccion'] = $Errdireccion="La dirección es necesaria";
        $bandera7=1;
    }else{
        $direccion= test_input($_POST["direccion"]);
        $_POST['direccion'] = $direccion;
        $bandera7=0; 
        if(!preg_match("/^(.{1,150})$/",$direccion)){
            $Errdireccion="La dirección es muy extensa";
            $bandera=1;
           }
    }
    if(empty($_POST["ciudad"])){
        $_POST['Errciudad'] =$Errciudad="La ciudad es necesaria";
        $bandera8=1;
    }else{
        $ciudad= test_input($_POST["ciudad"]);
        $_POST['ciudad'] = $ciudad;
        $bandera8=0; 
        if(!preg_match("/^(.{1,50})$/",$ciudad)){
            $Errciudad="La ciudad es muy extensa";
            $bandera=1;
           }
    }
    if(empty($_POST["pais"])){
        $_POST['Errpais'] =  $Errpais="El pais es necesario";
        $bandera9=1;
    }else{
        $pais= test_input($_POST["pais"]);
        $_POST['pais'] = $pais;
        $bandera9=0; 
        if(!preg_match("/^(.{1,100})$/",$pais)){
            $Errpais="El pais es muy extensa";
            $bandera=1;
           }
    }
    if(empty($_POST["estado"])){
        $_POST['Errestado'] =  $Errestado="El estado es necesario";
        $bandera10=1;
    }else{
        $estado= test_input($_POST["estado"]);
        $_POST['estado'] = $estado;
        $bandera10=0; 
        if(!preg_match("/^(.{1,50})$/",$estado)){
            $Errestado="El estado es muy extensa";
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
      if($bandera==1 || $bandera2==1 || $bandera3==1 || $bandera4==1 || $bandera5==1 || $bandera6==1 || $bandera7==1  || $bandera8==1  || $bandera9==1  || $bandera10==1){
        include('editar_perfil.php');
    }else{   
        
      session_start();
      $_SESSION['nombre'] = $_POST['nombre'];
      $_SESSION['fecha'] = $_POST['fecha'];
      $_SESSION['cp'] = $_POST['cp'];
      $_SESSION['direccion'] = $_POST['direccion'];
      $_SESSION['ciudad'] = $_POST['ciudad'];
      $_SESSION['estado'] = $_POST['estado'];
      $_SESSION['pais'] = $_POST['pais'];
       header('Location:actualizar_perfil.php');

    }        
      ?>
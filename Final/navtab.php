<?php
    session_start();
    if($_SESSION['correo']=='admin@thecomicbookstore.com'){    
    $conn = mysqli_connect("localhost","root","root","tienda");
			$correo=$_SESSION['correo'];
			$queryid="select id_usuario from usuarios where correo='$correo';";
			$idresult = mysqli_query($conn, $queryid);
			while($row = mysqli_fetch_assoc($idresult)) {
				$idusuario=$row['id_usuario'];
			}
      mysqli_close($conn);
      $conn = mysqli_connect("localhost","root","root","tienda");
			$insert="select cantidad from carrito where id_usuario=$idusuario";
			$resultado= mysqli_query($conn, $insert);
      $total_items=0;
      while($row = mysqli_fetch_assoc($resultado)) {
        $total_items+=$row['cantidad'];
			}
       mysqli_close($conn);
    ?>
    
    <div class="container">
    <nav class="navbar navbar-expand-lg  bg-dark navbar-dark fixed-top " >
    <a class="navbar-brand" href="index.php" style="   font-family: 'Bangers';">The Comic Book Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>   
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="paginacion.php">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="acerca.php">Nosotros</a>
            </li>
          </ul>
          <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" href="perfil.php"><i class="fa fa-fw fa-user"></i><?echo $_SESSION['correo'];?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registro_producto.php">Registrar nuevos productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tabla_productos.php">Lista de productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Cerrar Sesión</a>
            </li>
                <li class="nav-item">
                     <a class="nav-link" href="carrito.php"><i class="fas fa-shopping-cart"></i><span class="badge badge-pill badge-light"><?echo $total_items;?></span></a>
                </li>
            </ul>
        </div>  
        </div> 
      </nav>
    <?
    }
    else if($_SESSION['correo']!=null){
      $conn = mysqli_connect("localhost","root","root","tienda");
			$correo=$_SESSION['correo'];
			$queryid="select id_usuario from usuarios where correo='$correo';";
			$idresult = mysqli_query($conn, $queryid);
			while($row = mysqli_fetch_assoc($idresult)) {
				$idusuario=$row['id_usuario'];
			}
      mysqli_close($conn);
      $conn = mysqli_connect("localhost","root","root","tienda");
			$insert="select cantidad from carrito where id_usuario=$idusuario";
			$resultado= mysqli_query($conn, $insert);
      $total_items=0;
      while($row = mysqli_fetch_assoc($resultado)) {
        $total_items+=$row['cantidad'];
			}
       mysqli_close($conn);
    ?>
    <div class="container">
    <nav class="navbar navbar-expand-lg  bg-dark navbar-dark fixed-top " >
    <a class="navbar-brand" href="index.php" style="   font-family: 'Bangers';">The Comic Book Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>   
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="paginacion.php">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="acerca.php">Nosotros</a>
            </li>
          </ul>
          <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="perfil.php"><i class="fa fa-fw fa-user"></i> <?echo $_SESSION['correo'];?></a>
                </li>
                <li class="nav-item">
                     <a class="nav-link" href="logout.php">Cerrar Sesión</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link" href="carrito.php"><i class="fas fa-shopping-cart"></i><span class="badge badge-pill badge-light"><?echo $total_items;?></span></a>
                </li>
            </ul>
        </div>  
        </div> 
      </nav>
  
    <?
    }else{
    ?>  
    
    <nav class="navbar navbar-expand-lg  bg-dark navbar-dark fixed-top " >
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php" style="   font-family: 'Bangers';">The Comic Book Store</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>   
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="paginacion.php">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="acerca.php">Nosotros</a>
            </li>
          </ul>
          <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="fa fa-fw fa-user"></i> Iniciar sesión</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link" href="registro_usuario.php">Crear cuenta</a>
                </li>
                <li class="nav-item">
                     <a class="nav-link" href="login.php"><i class="fas fa-shopping-cart"></i><span class="badge badge-pill badge-light"></span></a>
                </li>
            </ul>
        </div>  
        </div> 
      </nav>
   
    <?
    }
    ?>
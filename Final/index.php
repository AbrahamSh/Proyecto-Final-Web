<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?require('estilo.php');?>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  
  }
  .container {
    max-width: 1300px;
}

.carousel-inner img {

max-height: 500px;
}

  </style>
    <title>Inicio</title>
</head>
<body>
   <?require_once('navtab.php');?>
   <!-- <div class="container" style="margin-top:80px">
      <h3>Productos</h3>
      </div> -->

      <br><br>
   <!-- <div class="container" > -->
 
   <div id="demo" class="carousel slide carousel-fade" data-ride="carousel" >
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
  <a href="paginacion.php">
    <div class="carousel-item active">
      <img src="imagenes/productos.jpg" alt="Productos" width="1000" height="500">
      <div class="carousel-caption">
        <a href="paginacion.php" class="btn  btn-dark btn-lg">Ver productos</a>
      </div>   
    </div>
    </a>
    <a href="acerca.php">
    <div class="carousel-item">
      <img src="imagenes/productos2.jpg" alt="Productos" width="1000" height="500">
      <div class="carousel-caption">
        <a href="acerca.php" class="btn  btn-dark btn-lg">Nosotros</a>
      </div>   
    </div>
    </a>
    <a href="acerca.php#contacto">
    <div class="carousel-item">
      <img src="imagenes/productos3.jpg" alt="Productos" width="1000" height="500">
      <div class="carousel-caption">
        <a href="acerca.php#contacto" class="btn  btn-dark btn-lg">Contáctanos</a>
      </div>   
    </div>
    </a>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<br>
<!-- </div> -->
<div class="container">
<h1>Comics más vendidos</h1>
<div class="card-deck">
<?php
$conn = mysqli_connect("localhost","root","root","tienda");
   $empSQL = "SELECT id_producto,nombre, foto,precio , sum(h.cantidad)   FROM  productos p , historial h where p.id_producto=h.producto_comprado group by h.producto_comprado ORDER by sum(h.cantidad) desc limit 3";
   $empResult = mysqli_query($conn, $empSQL);	
   while($row = mysqli_fetch_assoc($empResult )) {
    ?>
    <div class="card  border-dark mb-3">
    <a href="single-product.php?product=<?php echo $row['id_producto']?>">
            <img class="mx-auto d-block img-thumbnail img-fluid"   width="150px" height= "75px" src="imagenes/<?echo $row["foto"];?>" alt="Card image">
			</a>
			
            <div class="card-body text-center">
			<a href="single-product.php?product=<?php echo $row['id_producto'] ?>">
            <h5 class="card-title"><?echo $row["nombre"];?></h5>
			</a>
			<strong>$ <?php echo $row['precio']?></strong>
			<br>
			<a href="single-product.php?product=<?php echo $row['id_producto']?>" class="btn btn-primary btn-sm">
			Ver detalles
            </a>
            </div>
 </div>
 <?}?>


 </div>

</div>

      


        <!-- <div class="container">
        <div class="card-deck">

    <?php
     // require('paginacion.php');
    ?>
     
      </div>
      </div> -->
</body>
</html>
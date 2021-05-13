<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?require('estilo.php');?>
    <title>Comic</title>
</head>
<body>
<div class="container" style="margin-top:80px">

<?php 
     require('navtab.php');
	
   
	if(isset($_GET['product']) && !empty($_GET['product']) && is_numeric($_GET['product']))
    {
		$conn = mysqli_connect("localhost","root","root","tienda");
        $id=$_GET['product'];
        $query = "SELECT id_producto,nombre,foto,descripcion,precio,cantidad,editorial,origen,fabricante FROM productos where id_producto = $id";
        $result = mysqli_query($conn, $query);
       
    }else
        {
         echo  '404! No record found';
        }
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			session_start();
			if($_SESSION['correo']==null){
			?>
			<script>
			 $(document).ready(function(){
    			$("#exampleModalCenter").modal('show');
			});
			</script>
	       <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-body">
				<div class="container">
				<h1>Inicio de sesión</h1>
				<form role="form" method="post" action="procesa_login.php">
				<div class="form-group">
				<label for="correo">Correo electrónico:</label>
				<input type="email" class="form-control" name="correo" id="correo" value=<?echo $_POST["correo"];?>>
				</div>
				<div class="form-group">
				<label for="passwd">Contraseña:</label>
				<input type="password" class="form-control" name="passwd" id="passwd">
				</div>
				<br>
				<div class="row">
				<div class="col"><input type="submit" class="btn btn-primary btn-lg  btn-block" value="Iniciar sesión"></div>
				<div class="col"><a class="btn btn-info  btn-lg  btn-block" href="registro_usuario.php">Regístrate</a></div>
				<div class="col"></div>
				</div>

				</form>
				</div>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
				</div>
			</div>
			</div>
			<?
			}else{
            $conn = mysqli_connect("localhost","root","root","tienda");
			$cantidad=$_POST['cantidad'];
			$correo=$_SESSION['correo'];
			$id=$_POST['id_producto'];
				//Checar producto en el carrito si hay existente solo actualizar la cantidad
				$queryid="select id_usuario from usuarios where correo='$correo';";
				$idresult = mysqli_query($conn, $queryid);
				while($row = mysqli_fetch_assoc($idresult)) {
					$idusuario=$row['id_usuario'];
				}
				mysqli_close($conn);
				$conn = mysqli_connect("localhost","root","root","tienda");
				$queryproducto="select cantidad from carrito where producto_comprado=$id and id_usuario=$idusuario";
				$resultproducto = mysqli_query($conn, $queryproducto);
				while($row = mysqli_fetch_assoc($resultproducto)) {
					$total+=$row['cantidad'];
				}
				mysqli_close($conn);
			
				if($total>0){
					$conn = mysqli_connect("localhost","root","root","tienda");
					$cantidad+=$total;
					$update="update carrito set cantidad=$cantidad where producto_comprado=$id and id_usuario=$idusuario;";
					mysqli_query($conn, $update);
					mysqli_close($conn);
					require('navtab.php');
				}else{
					$conn = mysqli_connect("localhost","root","root","tienda");
			$queryid="select id_usuario from usuarios where correo='$correo';";
			$idresult = mysqli_query($conn, $queryid);
			while($row = mysqli_fetch_assoc($idresult)) {
				$idusuario=$row['id_usuario'];
			}
            mysqli_close($conn);
            $conn = mysqli_connect("localhost","root","root","tienda");
			$insert="INSERT INTO carrito (producto_comprado,id_usuario,cantidad) values ($id , $idusuario , $cantidad);";
			mysqli_query($conn, $insert);
            mysqli_close($conn);
			require('navtab.php');
		    
		}
	    }
		}
		$cantidadv=1;

        while($row = mysqli_fetch_assoc($result)) {
			$nombre = $row['nombre'];
           
    ?>
	<div class="card border-dark mb-3">
	<div class="container">
      <div class="row mt-3">
		<div class="col-md-5">
			
			<img  class="mx-auto d-block" src="imagenes/<?echo $row["foto"];?>"  height="250">
		</div>
		<div class="col-md-7">
			<h1><?php echo $row['nombre']?></h1>
			<h4>Editorial:<?php echo $row['editorial']?></h4>
			<h4>Autor:<?php echo $row['fabricante']?></h4>
			<h4>Idioma:<?php echo $row['origen']?></h4>
			<p><?php echo $row['descripcion']?></p>
			<h4>$<?php echo $row['precio']?></h4>
		   
			<form class="form-inline" method="POST" action="single-product.php?product=<?php echo htmlspecialchars($id);?>">
		      <label for="cantidad">Cantidad: </label>	
				<div class="form-group mb-2">
				
				<select  class="form-control"  id="cantidad" name="cantidad">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
					<!-- <input type="number"  id="cantidad" name="cantidad" class="form-control" placeholder="Cantidad" min="1" max="255" value="<?php echo $cantidadv?>"> -->
					<input type="hidden" id="id_producto" name="id_producto" value="<?php echo $row['id_producto']?>">
				</div>
				<div class="form-group mb-2 ml-2">
					<?if($row['cantidad']>0){?>
					<button type="submit" class="btn btn-primary" name="add_to_cart" value="add to cart"><i class="fas fa-shopping-cart"></i>Agregar al carrito</button>
					<?}else{?>
					 <button type="submit" class="btn btn-secondary" name="add_to_cart" value="add to cart" disabled><i class="fas fa-shopping-cart"></i>Agregar al carrito</button>
					<?}?>
				</div>
			</form>
			<strong>Stock:
		   <span><?php if($row['cantidad']>0){
				echo "  Disponible, hay ".$row['cantidad']." en existencia.";}
				else{
					echo"No hay disponible.";
				}  
				?></span></strong>
		
		</div>
	</div>
	<div class="row mt-3">
	</div>
     </div>  
	 </div> 
	 </div>
    <?php
        }
   ?>

</body>
</html>
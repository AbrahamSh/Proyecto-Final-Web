<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? require('estilo.php');?>
    <title>Lista de productos</title>
</head>
<body>
<?session_start();
     if($_SESSION['correo']=='admin@thecomicbookstore.com'){?>

<?require('navtab.php');?>
  <div class="container-fluid" style="margin-top:80px">
  <h2>Lista de productos</h2>
  <div class="table-responsive">
        <table class="table table-hover ">
        <thead>
          <tr>
             <th>Foto</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Fabricante</th>
            <th>Origen</th>
            <th>Editorial</th>
            <th></th>
          </tr>
        </thead>
<?  

$showRecordPerPage = 8;
$conn = mysqli_connect("localhost","root","root","tienda");
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$currentPage = $_GET['page'];
	}else{
		$currentPage = 1;
	}
	$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
	$totalEmpSQL = "SELECT * FROM productos";
	$allEmpResult = mysqli_query($conn, $totalEmpSQL);
	$totalEmployee = mysqli_num_rows($allEmpResult);
	$lastPage = ceil($totalEmployee/$showRecordPerPage);
	$firstPage = 1;
	$nextPage = $currentPage + 1;
	$previousPage = $currentPage - 1;
	$empSQL = "SELECT id_producto,nombre, foto,precio,descripcion,origen,fabricante,cantidad,editorial
	FROM `productos` LIMIT $startFrom, $showRecordPerPage";
	$empResult = mysqli_query($conn, $empSQL);		
     if (mysqli_num_rows($empResult ) > 0) {
        while($row = mysqli_fetch_assoc($empResult )) {
        
    ?>
     <tbody>
         <tr>
           <td><img class="img-thumbnail" width="150px" src="imagenes/<? echo $row['foto'];?>"> </td>
           <td><? echo $row['nombre'];?> </td>
           <td><?  echo substr($row['descripcion'],0,50) ?>...</td>
           <td>$<? echo $row['precio'];?> </td>
           <td><? echo $row['cantidad'];?> </td>
           <td><? echo $row['fabricante'];?> </td>
           <td><? echo $row['origen'];?> </td>
           <td><? echo $row['editorial'];?> </td>
           <td> <a class="btn btn-secondary" role="button" href="editar_producto.php?product=<?php echo htmlspecialchars($row['id_producto'])?>"><i class="fas fa-edit"></i></a></td>
          <td> <a class="btn btn-danger" role="button" href="eliminar_producto.php?product=<?php echo htmlspecialchars($row['id_producto'])?>"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
    <?php
        }
    }
    mysqli_close($con);
    ?>
     </tbody>
    </table>
    </div>
	<nav aria-label="Page navigation">
	  <ul class="pagination justify-content-center">
	  <?php if($currentPage != $firstPage) { ?>
		<li class="page-item">
		  <a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
			<span aria-hidden="true"><i class="fas fa-chevron-circle-left"></i></span>			
		  </a>
		</li>
		<?php } ?>
		<?php if($currentPage >= 2) { ?>
			<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
		<?php } ?>
		<li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
		<?php if($currentPage != $lastPage) { ?>
			<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
			<li class="page-item">
			  <a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
				<span aria-hidden="true"><i class="fas fa-chevron-circle-right"></i></span>
			  </a>
			</li>
		<?php }
    }else{
      echo"Error 404";
    } ?>
	  </ul>
	</nav>
    </div>
    </body>
</html>
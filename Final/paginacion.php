<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?require('estilo.php');?>

	<title>Productos</title>
</head>
<body>
<?require_once('navtab.php');?>
<div class="container" style="margin-top:80px">
      <h3>Productos</h3>

	  <div class="container">
        <div class="card-deck">
<?  
$showRecordPerPage = 6;
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
	$empSQL = "SELECT id_producto,nombre, foto,precio
	FROM `productos` LIMIT $startFrom, $showRecordPerPage";
	$empResult = mysqli_query($conn, $empSQL);		
     if (mysqli_num_rows($empResult ) > 0) {
        while($row = mysqli_fetch_assoc($empResult )) {
            if($contador==3){
               echo "</div>";
               echo "<div class=\"card-deck\">";
               $contador=0;
            }else{
                $contador++;
               
            }
        
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
        
    <?php
        }
    }
    mysqli_close($con);
    ?>
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
		<?php } ?>
	  </ul>
	</nav>	
	</div>
      
</div>
</body>
</html>
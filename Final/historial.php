<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? require('estilo.php');
    require('funcion.php'); ?>
    <title>Historial</title>
</head>
<body>
<?require('navtab.php');?>
<div class="container" style="margin-top:80px">
<?

$conn = mysqli_connect("localhost", "root", "root", "tienda");
$correo = $_SESSION['correo'];
$queryid = "select id_usuario from usuarios where correo='$correo';";
$idresult = mysqli_query($conn, $queryid);
while ($row = mysqli_fetch_assoc($idresult)) {
    $idusuario = $row['id_usuario'];
}
mysqli_close($conn);
$conn = mysqli_connect("localhost", "root", "root", "tienda");
$query = "SELECT id_historial,nombre,foto,fecha,h.cantidad as cantidad,total FROM historial h, productos p WHERE h.id_usuario =$idusuario and h.producto_comprado = p.id_producto; ";
$resultado = mysqli_query($conn, $query);
mysqli_close($conn);
if(mysqli_num_rows($resultado)==0 && $_SESSION['correo']!='admin@thecomicbookstore.com'){
echo "<h1>No has comprado nada aun...</h1>";}else{
?>
<h2>Historial de compras</h2>
  <div class="table-responsive">
        <table class="table table-hover ">
        <thead>
          <tr>
            <th># de Orden</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Fecha de compra</th>
            <th>Cantidad comprada</th>
            <th>Precio total del pedido</th>
          </tr>
        </thead>

<?
if($_SESSION['correo']=='admin@thecomicbookstore.com'){
  $showRecordPerPage = 8;
$conn = mysqli_connect("localhost","root","root","tienda");
	if(isset($_GET['page']) && !empty($_GET['page'])){
		$currentPage = $_GET['page'];
	}else{
		$currentPage = 1;
	}
	$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
    $conn = mysqli_connect("localhost","root","root","tienda");
	$totalEmpSQL = "SELECT * FROM historial";
	$allEmpResult = mysqli_query($conn, $totalEmpSQL);
	$totalEmployee = mysqli_num_rows($allEmpResult);
	$lastPage = ceil($totalEmployee/$showRecordPerPage);
	$firstPage = 1;
	$nextPage = $currentPage + 1;
	$previousPage = $currentPage - 1;
    mysqli_close($conn);

  $conn = mysqli_connect("localhost", "root", "root", "tienda");
  $query = "SELECT id_historial,nombre,foto,fecha,h.cantidad as cantidad,total FROM historial h, productos p WHERE  h.producto_comprado = p.id_producto; ";
  $resultado = mysqli_query($conn, $query);
  if(mysqli_num_rows($resultado)==0 ){ echo "<h1>No hay compras realizadas aun...</h1>";}
}


else if($_SESSION['correo']!=null){
  $showRecordPerPage = 8;
  $conn = mysqli_connect("localhost","root","root","tienda");
    if(isset($_GET['page']) && !empty($_GET['page'])){
      $currentPage = $_GET['page'];
    }else{
      $currentPage = 1;
    }
    $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
      $conn = mysqli_connect("localhost", "root", "root", "tienda");
      $correo = $_SESSION['correo'];
      $queryid = "select id_usuario from usuarios where correo='$correo';";
      $idresult = mysqli_query($conn, $queryid);
      while ($row = mysqli_fetch_assoc($idresult)) {
          $idusuario = $row['id_usuario'];
      }
      mysqli_close($conn);
      $conn = mysqli_connect("localhost","root","root","tienda");
    $totalEmpSQL = "SELECT * FROM historial where id_usuario=$idusuario";
    $allEmpResult = mysqli_query($conn, $totalEmpSQL);
    $totalEmployee = mysqli_num_rows($allEmpResult);
    $lastPage = ceil($totalEmployee/$showRecordPerPage);
    $firstPage = 1;
    $nextPage = $currentPage + 1;
    $previousPage = $currentPage - 1;
      mysqli_close($conn);

    $conn = mysqli_connect("localhost", "root", "root", "tienda");
    $correo = $_SESSION['correo'];
    $queryid = "select id_usuario from usuarios where correo='$correo';";
    $idresult = mysqli_query($conn, $queryid);
    while ($row = mysqli_fetch_assoc($idresult)) {
        $idusuario = $row['id_usuario'];
    }
    
    mysqli_close($conn);
    $conn = mysqli_connect("localhost", "root", "root", "tienda");
    $query = "SELECT id_historial,nombre,foto,fecha,h.cantidad as cantidad,total FROM historial h, productos p WHERE h.id_usuario =$idusuario and h.producto_comprado = p.id_producto; ";
    $resultado = mysqli_query($conn, $query);

}
else{
  echo"Error 403";
} 
 
    while ($row = mysqli_fetch_assoc($resultado)) {


?>
  <tbody>
         <tr>
          <td><? echo $row['id_historial'];?></td>
           <td><img class="img-thumbnail" width="150px" src="imagenes/<? echo $row['foto'];?>"> </td>
           <td><? echo $row['nombre'];?> </td>
           <td><? echo $row['fecha'];?> </td>
           <td><? echo $row['cantidad'];?> </td>
           <td><?echo money_format('%n',(float) $row['total']);?></td>
        </tr>  
<?
}
mysqli_close($con);?>
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

<?}
}
?>	  
</ul>
	</nav>
  </div>
</body>
</html>
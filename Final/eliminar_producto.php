<?
session_start();

if($_SESSION['correo']=='admin@thecomicbookstore.com'){
$idproducto=$_GET['product'];
$conn = mysqli_connect("localhost","root","root","tienda");
$query = "delete from productos where id_producto=$idproducto;";
mysqli_query($conn, $query);
mysqli_close($conn);	
header("location:tabla_productos.php");

}


?>
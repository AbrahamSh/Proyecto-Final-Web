<?
session_start();
if($_SESSION['correo']!=null){
$producto=$_GET['idproducto'];
$cantidad= $_GET['cantidad'];
$uid=$_GET['idusuario'];

$conn = mysqli_connect("localhost", "root", "root", "tienda");
$query = "UPDATE carrito set cantidad=$cantidad WHERE id_usuario =$uid and producto_comprado = $producto; ";
if (!mysqli_query($conn,$query)) {
    die('Error: ' . mysqli_error($conn));
  }
  
$resultado = mysqli_query($conn, $query);
mysqli_close($conn);
}
?>
<?
$bandera=0;
  session_start();
  $conn = mysqli_connect("localhost", "root", "root", "tienda");
  $correo = $_SESSION['correo'];
  $queryid = "select id_usuario from usuarios where correo='$correo';";
  $idresult = mysqli_query($conn, $queryid);
  while ($row = mysqli_fetch_assoc($idresult)) {
      $idusuario = $row['id_usuario'];
  }
  mysqli_close($conn);
  $conn = mysqli_connect("localhost", "root", "root", "tienda");
  $query = "SELECT id_carrito, c.cantidad as cantidad, p.cantidad as cantidadp, id_producto, producto_comprado,nombre FROM carrito c, productos p WHERE c.id_usuario =$idusuario and c.producto_comprado = p.id_producto; ";
  $resultado = mysqli_query($conn, $query);
  
  while ($row = mysqli_fetch_assoc($resultado)) {
    $producto=$row['nombre'];
    $cantidadp = $row['cantidadp'];
    $cantidad=$row['cantidad'];
    if($row['cantidad']>$row['cantidadp']){
      header('Location:carrito.php?error=1&producto='.$producto);
      $bandera=1;
    }
  }
  mysqli_close($conn);
  if($bandera==0){
   $total=$_POST['total'];
  $conn = mysqli_connect("localhost", "root", "root", "tienda");
  $query = "SELECT id_carrito, c.cantidad as cantidad, p.cantidad as cantidadp, id_producto, producto_comprado FROM carrito c, productos p WHERE c.id_usuario =$idusuario and c.producto_comprado = p.id_producto; ";
  $resultado = mysqli_query($conn, $query);
  $numeroreglon= mysqli_num_rows($resultado);
  mysqli_close($conn);
  $timestamp = date('Y-m-d');
  echo $numeroreglon;
  
  $conn = mysqli_connect("localhost", "root", "root", "tienda");
  $query1 = "SELECT id_carrito, c.cantidad as cantidad, p.cantidad as cantidadp, id_producto, producto_comprado FROM carrito c, productos p WHERE c.id_usuario =$idusuario and c.producto_comprado = p.id_producto; ";
  $result = mysqli_query($conn, $query1);
  mysqli_close($conn);
  while ($row1 = mysqli_fetch_assoc($result)) {
 
    $idcarrito=$row1['id_carrito'];
    $cantidadp = $row1['cantidadp'];
    $cantidadc=  $row1['cantidad'];
    $cantidad=$row1['cantidadp']- $row1['cantidad'];
    $idproducto=$row1['id_producto'];
    if($cantidadp!=0){
    $conn = mysqli_connect("localhost", "root", "root", "tienda");
      $update="UPDATE productos set cantidad=$cantidad where id_producto=$idproducto; ";
      // if (!mysqli_query($conn, $update)) {
      //     die('Error: 2 ' . mysqli_error($conn));
      //   }
      mysqli_query($conn, $update);
    // mysqli_close($conn);
    // $conn = mysqli_connect("localhost", "root", "root", "tienda");
      $insert="INSERT into historial (producto_comprado, id_usuario,fecha,cantidad,total) values ($idproducto,$idusuario,'$timestamp',$cantidadc,$total); ";
      // if (!mysqli_query($conn, $insert)) {
      //     die('Error: 3 ' . mysqli_error($conn));
      //   }
      mysqli_query($conn, $insert);
    //  mysqli_close($conn);
      $conn = mysqli_connect("localhost", "root", "root", "tienda");
      $delete="DELETE FROM carrito where id_carrito=$idcarrito and producto_comprado=$idproducto; ";
      mysqli_query($conn, $delete);
      mysqli_close($conn);
      }
  }
 
  header('Location:agradecimiento.php');


 
 

}
    


?>
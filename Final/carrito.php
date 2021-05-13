<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <? require('estilo.php'); 
     require('funcion.php'); 
    ?>
    <script>
    function showUser(str,id,uid) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window.location.replace("carrito.php")
        }
        };
        xmlhttp.open("GET","actualizar_carrito.php?idproducto="+id+"&cantidad="+str+"&idusuario="+uid,true);
        xmlhttp.send();
    }
    </script>
    <title>Carrito</title>
</head>

<body>
    <? require('navtab.php');
      if ($_SERVER["REQUEST_METHOD"] == "GET") {
       $error=$_GET['error'];
       $producto=$_GET['producto'];
      }
    ?>
    <div class="container mb-4" style="margin-top:80px">
    <?if($error==1){?>

<div  class="alert alert-danger alert-dismissible fade show">
<button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>No se puede comprar la cantidad de unidades del comic <u><?echo" ". $producto;?></u>.</strong>
</div>
  <?}?>
    <h1>Carrito</h1>
    <?
       $conn = mysqli_connect("localhost", "root", "root", "tienda");
       $query = "SELECT * FROM carrito c, productos p WHERE c.id_usuario =$idusuario and c.producto_comprado = p.id_producto; ";
       $resultado = mysqli_query($conn, $query);
       if(mysqli_num_rows($resultado)!=0){

    
    ?>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
           
                <table class="table">
                    <!-- <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col" class="text-center">Nombre</th>
                            <th scope="col" class="text-center">Precio</th>
                            <th scope="col" class="text-center" >Cantidad</th>
                            <th> </th>
                        </tr>
                    </thead> -->
        <?
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
        $query = "SELECT foto, nombre, c.cantidad as cantidad, p.cantidad as cantidadp, precio, id_producto FROM carrito c, productos p WHERE c.id_usuario =$idusuario and c.producto_comprado = p.id_producto; ";
        $resultado = mysqli_query($conn, $query);
   
        mysqli_close($conn);
        setlocale(LC_MONETARY, 'en_US');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = mysqli_connect("localhost", "root", "root", "tienda");
            $idproducto=$_POST['idproducto'];
            $delete="delete from carrito where id_usuario =$idusuario and producto_comprado = $idproducto;";
            mysqli_query($conn, $delete);
            mysqli_close($conn);
            header("Refresh:0"); 
        }
        
         
        while ($row = mysqli_fetch_assoc($resultado)) {
                          
        ?>  
             <tbody>
             <tr> 
           <td ><img class="img-thumbnail" style="min-height: 95px; min-width: 75px;"  width="150px" height= "75px"   src="imagenes/<? echo $row["foto"]; ?>" alt="Card image"></td>
           <td><strong><? echo $row['nombre'];?></strong>
           <br><br>
           <? if( $row['cantidadp']!=0){?>
            Cantidad: <span>
            <form action="">
            <input type="hidden" name="idproducto" value="<?echo $row['id_producto'];?>">
            <?if($row['cantidad']>$row['cantidadp']){?>
           <strong> Solo hay, <?echo" ". $row['cantidadp']. " "; ?> en existencia. La cantidad guardada es: </strong>
                <select  class="form-control"  id="cantidad" name="cantidad" onchange="showUser(this.value,<?echo $row['id_producto'];?>,<?echo $idusuario?> )">
                        <option value="1" <? if($row['cantidad']==1){echo "selected";} ?>>1</option>
						<option value="2" <? if($row['cantidad']==2){echo "selected";} ?>>2</option>
						<option value="3" <? if($row['cantidad']==3){echo "selected";} ?>>3</option>
						<option value="4" <? if($row['cantidad']==4){echo "selected";} ?>>4</option>
						<option value="5" <? if($row['cantidad']==5){echo "selected";} ?> >5</option>
                        <?if($row['cantidad']>5){?>
                         <option value="<?echo $row['cantidad'];?>" selected><?echo $row['cantidad'];?></option>
                         <?}?>     
					</select>
            <?}else{?>
				<select  class="form-control"  id="cantidad" name="cantidad" onchange="showUser(this.value,<?echo $row['id_producto'];?>,<?echo $idusuario?>  )">
						<option value="1" <? if($row['cantidad']==1){echo "selected";} ?>>1</option>
						<option value="2" <? if($row['cantidad']==2){echo "selected";} ?>>2</option>
						<option value="3" <? if($row['cantidad']==3){echo "selected";} ?>>3</option>
						<option value="4" <? if($row['cantidad']==4){echo "selected";} ?>>4</option>
						<option value="5" <? if($row['cantidad']==5){echo "selected";} ?> >5</option>
                        <?if($row['cantidad']>5){?>
                         <option value="<?echo $row['cantidad'];?>" selected><?echo $row['cantidad'];?></option>
                         <?}?>             
					</select>
                    <?}?>    
             </form>
               <!-- <input type="number" class="col sm-3"  name="" id="" min="1" max="<? if($row['cantidad']==1){echo "selected";} echo $row['cantidadp'];?>" value="<? echo $row['cantidad'];?>"> -->
               <?}else{  echo "No hay disponible";}?></span></td>
           <td class="text-right"> <strong><? echo  money_format('%n',(float) $row['precio']);?></strong>
            <br><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
           <input type="hidden" name="idproducto" value="<?echo $row['id_producto'];?>">
           <button  class="btn btn-danger bt-sm" type="submit"><i class="fas fa-trash-alt"></i></button></form>

           </td>          
           <?$total+=$row['precio']*$row['cantidad'];?>
        </tr>
        <? } ?>
        <tr>
                            <td></td>
                            <td>Subtotal</td>
                            <td class="text-right"><?echo money_format('%n',(float)$total);?></td>
                            <td></td>
                        </tr>
                        <tr>
                           
                        <td></td>
                            <td>Gastos de envio</td>
                            <td class="text-right">$100</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?echo money_format('%n',(float)$total+100);?></strong></td>
                            <td></td>
                        </tr>
            </tbody>
                </table>
            </div>
        </div>
    <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                <form action="procesa_carrito.php" method="post">
                <input type="hidden" name="total" value="<?echo $total+100?>">
                <button type="submit" class="btn btn-lg btn-block btn-success text-uppercase">Proceder a realizar la compra</button>
                </form>
                </div>
            </div>
        </div>
        
    </div>
    <?} else{ echo "<h1>El carrito está vacío...</h1>";}?>

</div>

</html>
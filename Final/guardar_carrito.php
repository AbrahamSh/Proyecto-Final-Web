<? if ($_SERVER["REQUEST_METHOD"] == "POST") {
			session_start();
            $conn = mysqli_connect("localhost","root","root","tienda");
			$cantidad=$_POST['cantidad'];
			$correo=$_SESSION['correo'];
			$id=$_POST['id_producto'];
			$_SESSION['bandera']=1;
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
			// if (!mysqli_query($conn,$insert)) {
			// 	echo $id;
			// 	echo $idusuario;
			// 	echo $cantidad;
			// 	die('Error: ' . mysqli_error($conn));
			//   }
             
		}
?>
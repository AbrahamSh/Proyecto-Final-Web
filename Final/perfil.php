<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <? require('estilo.php');?>
    <title>Menú de usuario</title>
</head>
<body>
<? require('navtab.php');
if($_SESSION['correo']!=null){
?>
<div class="container" style="margin-top:80px">
<h1>Menú de usuario</h1>
<!-- <div class=" mx-auto btn-group-vertical btn-group-lg "> -->
    <a href="editar_perfil.php" class="btn btn-outline-dark btn-block">Editar perfil</a>
    <a href="cambiar_passwd.php" class="btn btn-outline-dark btn-block">Cambiar contraseña</a>
    <a href="cambiar_tarjeta.php" class="btn btn-outline-dark btn-block">Cambiar tarjeta</a>
    <a href="historial.php" class="btn btn-outline-dark btn-block">Historial de Compra</a>
<!-- </div> -->
</div>
</body>
<?}else{
echo"Error 403";}?>
</html>
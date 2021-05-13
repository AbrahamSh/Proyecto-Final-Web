<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?require('estilo.php');?>
    <script>
function myFunction() {
  var x = document.getElementById("passwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
    </script>
    <title>Login</title>
</head>
<body>
<?require('navtab.php');?>
<div class="container" style="margin-top:80px">

<h1>Inicio de sesión</h1>
<form role="form" method="post"  action="procesa_login.php">
<div class="form-group">
<label for="correo">Correo electrónico:</label>
<input type="email" class="form-control" name="correo" id="correo" value=<?echo $_POST["correo"];?>>
</div>
<div class="form-group">
<label for="passwd">Contraseña:</label>
<input type="password" class="form-control" name="passwd" id="passwd">
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="" onclick="myFunction()">Ver contraseña
  </label>
</div>

<br>
<div class="row">
  <div class="col"><input type="submit" class="btn btn-primary btn-lg  btn-block" value="Iniciar sesión"></div>
  <div class="col"><a class="btn btn-info  btn-lg  btn-block" href="registro_usuario.php">Regístrate</a></div>
 
</div>

</form>
</div>
</body>
</html>
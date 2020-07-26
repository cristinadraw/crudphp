
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kawschool Store</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #4b2443;>
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">CAI</a>
        </div>
        
      </div>
    </nav>

    <div class="container" id="main">
     <div class="main-login">
      <form action="login.php" method="POST">
       <div class="panel panel-default">
       <div class="panel-heading">
        <h3 class="text-center">
            ACCESOS AL PANEL
        </h3>
    </div>
    <div class="panel-body">

<p class="text-center"> 
<img src="../assets/imagenes/logo2.jpeg " width="100%">
</p>

<div class="form-group">
    <label >Usuario</label>
    <input type="text" class="form-control" name="NombreUsuario" placeholder="usuario" required>
</div>
<div class="form-group">
    <label >Contraseña</label>
    <input type="passwprd" class="form-control" name="ContraseñaUsuario" placeholder="Contraseña" required>
</div>
       
<button  type="submit"  class="btn btn-primary btn-block">
    Iniciar Sesion
</button>
    </div>
    </div>

   </form>
   </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

  </body>
</html>

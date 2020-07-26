<?php
session_start();
if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info']) )
header('Location: index.php');
   


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any  other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CAI</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #4b2443;">
      <div class="container">
      <!-- colocar el logo al inicio 
        <a class="navbar-brand" href="#">
          <img src="imagenes/logonavbar.jpg" alt="">
        </a>-->
        <div class="navbar-header">
          <a class="navbar-brand" href="../panel/dashboard.php">CAI</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="productos/index.php" class="btn">Lista Productos </a>
            </li> 
            <li>
              <a href="" class="btn">CARRITO </a>
            </li> 
           
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
                aria-expanded="false"><!--<?php print ($_SESSION ['usuario_info']) ?>-->Admin<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="cerrar_session.php">Salir</a></li>
                </ul>
            </li>
          </ul>
        </div>
        
      </div>
    </nav>

    <div class="container" id="main">


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

  </body>
</html>

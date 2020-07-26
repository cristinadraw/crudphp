
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>productos</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top"  style="background-color: #4b2443;>
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" style="background-color: #4b2443; data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">CAI</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="" class="btn">CARRITO <span class="badge">0</span></a>
            </li>
            <li>
              <a href="panel/index.php" class="btn">Sesion <span class="badge">0</span></a>
            </li> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="main">

   <div class="row">
     <?php
     require 'vendor/autoload.php';
     $producto = new Kawschool\Producto;
     $info_producto = $producto->mostrar();
     $cantidad = count($info_producto);
     if ($cantidad>0){
       for ($i=0; $i < $cantidad; $i++) { 
       $item=$info_producto[$i];
     ?>

<div class="col-md-3">

<div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="text-center nombre-producto"><?php print $item['nombre'] ?></h1>  
                    </div>
                    <div class="panel-body">
                      <?php
                          $Foto = 'Upload/'.$item['foto'];
                          if(file_exists($Foto)){
                        ?>
                          <img src="<?php print $Foto; ?>" class="img-responsive">
                      <?php }else{?>
                        <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                      <?php }?>
                    </div>
</div>
<div class="panel-footer">
<a href="" class="btn-success btn-block">
<span class="glyphicon glyphicon-fire"> Ver Másss </span>
</a>

</div>
</div>



     <?php
       }
     }else{
     ?>

<h4>No hay registros de productos</h4>
<?php
}
?>

   </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>

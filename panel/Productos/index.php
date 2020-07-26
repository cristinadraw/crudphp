<?php
session_start();
if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info']) )
header('Location: ../index.php');
?>  
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
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #4b2443;>
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="../dashboard.php">CAI</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li class="active">
              <a href="" class="btn">Lista Productos </a>
            </li> 
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
                aria-expanded="false"><!--<?php print $_SESSION ['usuario_info']['NombreUsuario'] ?>-->admin <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../cerrar_session.php">Salir</a></li>
                </ul>
            </li>
          </ul>
        </div>
        
      </div>
    </nav>

    <div class="container" id="main">
<div class="row">
<div class="col-md-12">
<div class="pull-right">
<a href="Registro.php" class="btn btn-primary">
<span class="glyphicon glyphicon-plus"></span>    
Nuevo</a>
</div>
</div>
</div>

<div class="row">
    <div class="col-md-12"> 
<fieldset>
    <legend> Listado de productos</legend>
    <table class=" table table-bordered">
<thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th class="text-center">Foto</th>
        <th>Eliminar</th>
        <th>Editar</th>
    </tr>
</thead>
<tbody>
<?php

use Kawschool\Producto;

require '../../vendor/autoload.php';
$producto = new Kawschool\Producto;
$info_producto= $producto->mostrar();

$cantidad = count($info_producto);
 
if ($cantidad>0){
 
  for ($x=0 ; $x<$cantidad; $x++){
   $item= $info_producto[$x];

?>


    <tr>
        <td><?php print $item['id']?> </td>
        <td><?php print $item['nombre']?></td>
        <td><?php print $item['categoria']?></td>
        <td><?php print $item['precio']?></td>
        <td class="text-center">
          <?php 
          $foto = '../../Upload/'.$item['foto'];
          if (file_exists($foto)){
          ?>

          <img src="<?php print $foto ?>" width="50">

          </td>
          <?php 
          }else{
          ?>
Sin foto
<?php 
          }
          ?>

        <td class="text-center">
            <a href="../acciones.php?id=<?php print $item['id']?>" class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </td>


        <td class="text-center">
          <span class="glyphicon glyphicon-edit"></span>
            <a href="Actualizar.php?id=<?php print $item['id']?>" class="btn btn-success ">
            </a>
        </td>
        
    </tr>

    <?php
  }
} else {

    ?>

<tr>
  <td colspan="7">No hay Registros</td>
</tr>

<?php 
} 

?>
</tbody>
    </table>
</fieldset>
    </div>
</div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

  </body>
</html>
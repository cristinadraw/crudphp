<?php
session_start();
if(!isset($_SESSION['usuario_info']) OR empty($_SESSION['usuario_info']) )
header('Location: index.php');
   


require '../../vendor/autoload.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
$id = $_GET['id'];
$producto = new Kawschool\Producto;
$resultado= $producto->mostrarPorId($id);
if(!$resultado){
  header('Location: ../index.php');
}
}else{
  header('Location:index.php');
}

?>
<html lang="en">
<!DOCTYPE html>
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
            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><!--<?php print $_SESSION ['usuario_info']['NombreUsuario'] ?>-->admin <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../cerrar_session.php">Salir</a></li>
                </ul>
            </li>
          </ul>
        </div>
        
      </div>
    </nav>

    <div class="container" id="main" >
    <div class="row">
        <div class="col-md-12">
          <fieldset>
            <legend>Datos del Producto</legend>
            <form method="POST" action="../acciones.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php print $resultado['Id']?>">  
            <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label>Nombre</label>
                          <input type="text" class="form-control" name="Nombre"  value="<?php print $resultado['Nombre']?>" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Descripción</label>
                          <textarea class="form-control" name="Descripcion" id="" cols="3"  required><?php print $resultado['Descripcion']?></textarea>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Categorias</label>
                          <select class="form-control" name="Categoria_Id" required>
                            <option value="">--SELECCIONE--</option>
                            <?php
                           require '../../vendor/autoload.php';
                           $categoria = new Kawschool\Categoria;
                           $info_categoria = $categoria-> mostrar();
                           $cantidad= count ($info_categoria);
                           for ($i=0; $i < $cantidad ; $i++) { 
                           $item = $info_categoria[$i];
                           ?>
                           <option value="<?php print $item['id']?>"
                           <?php
                           print $resultado['Categoria_Id']==$item['id'] ?'selected':''
                           ?>
                           >
                           <?php print $item['Nombre']?></option>
                           <?php
                            }
                           ?>

                          </select>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Foto</label>
                          <input type="file" class="form-control" name="Foto" >
                      <input type="hidden" name="foto_temp"  value="<?php print $resultado['Foto']?>">
                        </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-3">
                      <div class="form-group">
                          <label>Precio</label>
                          <input type="text" class="form-control" name="Precio"  value="<?php print $resultado['Precio']?>" placeholder="0.00" required>
                      </div>
                  </div>
              </div>
              <input type="submit" name="accion" class="btn btn-primary" value="Actualizar">
              <a href="index.php" class="btn btn-danger">Cancelar</a>
            </form>
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

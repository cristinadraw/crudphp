<?php

require'../vendor/autoload.php';

$producto = new Kawschool\Producto;

if ($_SERVER['REQUEST_METHOD']=== 'POST'){
    if ($_POST['accion']==='Registrar'){
   
        if (empty($_POST['Nombre'])){
          exit('Completar nombre');
        }

        if (empty($_POST['Nombre'])){
            exit('Completar nombre');
                    }
        if (empty($_POST['Descripcion'])){
             exit('Completar Descripcion');
     } 
     if (empty($_POST['Categoria_Id'])){
             exit('Completar Categoria ');
       }

       if (empty($_POST['Precio'])){
        exit('Completar Precio ');
  }
  
if (!is_numeric($_POST['Categoria_Id'])){
    exit('Seleccionar una categoria valida');
}

if (!is_numeric($_POST['Precio'])){
    exit('Insertar un precio validoa');
}

$_params= array(
'Nombre' => $_POST['Nombre'],
'Descripcion' => $_POST['Descripcion'],
'Foto' => subirFoto(),
'Precio' => $_POST['Precio'],
'Categoria_Id' => $_POST['Categoria_Id']
);

$rpt =$producto ->registrar($_params);


if($rpt)
header('Location: Productos/index.php');
else
print 'Error al registrar un producto';

        }



        if ($_POST['accion']==='Actualizar'){
   
            if (empty($_POST['Nombre'])){
              exit('Completar nombre');
            }
    
            if (empty($_POST['Nombre'])){
                exit('Completar nombre');
                        }
            if (empty($_POST['Descripcion'])){
                 exit('Completar Descripcion');
         } 
         if (empty($_POST['Categoria_Id'])){
                 exit('Completar Categoria ');
           }
    
           if (empty($_POST['Precio'])){
            exit('Completar Precio ');
      }
      
    if (!is_numeric($_POST['Categoria_Id'])){
        exit('Seleccionar una categoria valida');
    }
    
    if (!is_numeric($_POST['Precio'])){
        exit('Insertar un precio validoa');
    }

    


    $_params= array(
    'Nombre' => $_POST['Nombre'],
    'Descripcion' => $_POST['Descripcion'],
    'Precio' => $_POST['Precio'],
    'Categoria_Id' => $_POST['Categoria_Id'],
    'Id'=>$_POST['id']
    );

    if(!empty($_POST['foto_temp'])){
        $_params['Foto']=$_POST['foto_temp'];
    }

    if(!empty($_FILES['Foto']['name'])){
        $_params['Foto']=subirFoto();
    }
    
    $rpt =$producto ->actualizar($_params);
    
    if($rpt)
            header('Location: Productos/index.php');
        else
            print 'Error al registrar un producto';
    
    
            }

            
} 

if($_SERVER['REQUEST_METHOD']==='GET'){

    $id= $_GET['id'];
    $rpt =$producto ->eliminar($id);

    if($rpt)
            header('Location: Productos/index.php');
        else
            print 'Error al eliminar un producto';

}


function subirFoto() {

    $carpeta = __DIR__.'/../Upload/';

    $archivo = $carpeta.$_FILES['Foto']['name'];

    move_uploaded_file($_FILES['Foto']['tmp_name'],$archivo);

    return $_FILES['Foto']['name'];


}




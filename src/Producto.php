<?php

namespace Kawschool;

class Producto{

private $config;
private $cn=null;

public function __construct(){

$this->config=parse_ini_file(__DIR__.'/../config.ini'); 

$this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
));
}


public function registrar($_params){
 $sql = "INSERT INTO `producto`(`Nombre`, `Descripcion`, `Foto`, `Precio`, `Categoria_Id`) 
          VALUES (:Nombre,:Descripcion,:Foto,:Precio,:Categoria_Id)";

$resultado = $this -> cn ->prepare($sql);

$_array = array(
    ":Nombre" => $_params['Nombre'],
    ":Descripcion" => $_params['Descripcion'],
    ":Foto" => $_params['Foto'],
    ":Precio" => $_params['Precio'],
    ":Categoria_Id" => $_params['Categoria_Id']
);

if($resultado->execute($_array))
return true;
else
return false;


}



public function actualizar($_params){

    $sql = "UPDATE `producto` SET `Nombre`=:Nombre,
    `Descripcion`=:Descripcion,
    `Foto`=:Foto,
    `Precio`=:Precio,
    `Categoria_Id`=:Categoria_Id 
    WHERE `Id`=:Id";

$resultado = $this -> cn ->prepare($sql);

$_array = array(
    ":Nombre" => $_params['Nombre'],
    ":Descripcion" => $_params['Descripcion'],
    ":Foto" =>$_params['Foto'],
    ":Precio" => $_params['Precio'],
    ":Categoria_Id" => $_params['Categoria_Id'],
    ":Id" => $_params['Id']
);

print_r($_array);


if($resultado->execute($_array))
return true;
else
return false;


}


public function eliminar($id){
    
    $sql = "DELETE FROM `producto` WHERE `id`=:id";

$resultado = $this -> cn ->prepare($sql);

$_array = array(
    ":id" => $id
);

if($resultado->execute($_array))
return true;
else
return false;
}

public function mostrar(){

    $sql = "SELECT producto.id , producto.nombre, foto, precio, descripcion , categorias.nombre as categoria FROM producto 
    INNER JOIN categorias
    on producto.Categoria_Id = Categorias.id 
    ORDER BY Producto.id DESC";

$resultado = $this -> cn ->prepare($sql);


if($resultado->execute())
return $resultado -> fetchAll();
else
return false;

}

public function mostrarPorNombre($Nombre){

    $sql = "SELECT * FROM `producto`
    WHERE `NOMBRE`=:Nombre";

$resultado = $this -> cn ->prepare($sql);

$_array = array(
    ":Nombre" => 'Nombre'
);


if($resultado->execute($_array))
return $resultado -> fetchAll();
else
return false;

}

public function mostrarPorId($id){

    $sql = "SELECT * FROM `producto`
    WHERE `Id`=:id";

$resultado = $this -> cn ->prepare($sql);

$_array = array(
    ":id" => $id
);


if($resultado->execute($_array))
return $resultado -> fetch();
else
return false;

}





    
}




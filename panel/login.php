<?php

if ($_SERVER['REQUEST_METHOD'] ==='POST'){

    $nombre_usuario = $_POST['NombreUsuario'];
    $clave = $_POST['ContraseñaUsuario'];
    require '../vendor/autoload.php';
    $usuario = new Kawschool\ Usuario;
    $resultado = $usuario->Login($nombre_usuario, $clave);

    if($resultado){
        session_start();
        $_SESSION['usuario_info'] = array(
            'nombre_usuario'=>$resultado['nombre_usuario'],
            'estado'=>1
        );

        
        header('Location: dashboard.php');

    }else{
        exit(json_encode(array('estado'=>FALSE,'mensaje'=>'Error al iniciar sesion')));
    }


}
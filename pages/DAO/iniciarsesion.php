<?php
# Conectamos con MySQL
include 'conexion.php';

$usuario="";
    $contrasena="";
    $pass="";

    if( isset( $_POST['txtUsuario'] ) ){
        include 'conexion.php';

        $usuario = $_POST['txtUsuario'];
        $contrasena = $_POST['txtContrasenia'];

        $sel = $mysqli ->query("SELECT contrasenia,id FROM usuario WHERE usuario='$usuario'");

        while($fila = $sel -> fetch_assoc()){
            $pass = $fila['contrasenia'];
            $iduser = $fila['id'];
        }

        if($pass==""){
            header ("Location: ../../pages/login.php?msj=1");
            $contrasena="";
            $pass="";
        }else{
            if($contrasena == $pass){
                session_start();
                $_SESSION['sesion'] = $iduser;
                header ("Location: ../../");
            }else{
                header ("Location: ../../pages/login.php?msj=2");

                $contrasena="";
                $pass="";
            }
        }

    }
?>
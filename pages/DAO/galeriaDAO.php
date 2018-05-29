<?php

 
# Conectamos con MySQL
include 'conexion.php';

if(isset( $_GET["id"])){
    mostrarImagen($mysqli);
}

switch($_GET["case"]){
    case 1:
        agregar($mysqli,$_POST["txtTitulo"],$_POST["txtDescripcion"]);
        break;
    case 2:
        modificar($mysqli,$_POST["txtId"],$_POST["txtTitulo"],$_POST["txtDescripcion"],$_POST["txtCheck"]);
        break;
    
    default:
        
        break;
}


 
# Buscamos la imagen a mostrar
function mostrarImagen($mysqli){
    $result=$mysqli->query("SELECT * FROM `galeria` WHERE id=".$_GET["id"]);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    
    # Mostramos la imagen
    echo $row["imagen"];
}

function modificar($mysqli,$idT,$titulo,$descripcion,$status){
    # Comprovamos que se haya subido un fichero
    if (is_uploaded_file($_FILES['userfile']["tmp_name"])){

        # verificamos el formato de la imagen
        if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")
        {
            $imagenEscapes=$mysqli->real_escape_string(file_get_contents($_FILES["userfile"]["tmp_name"]));

            $sql="UPDATE servicios SET titulo='".$titulo."', status='".$status ."',descripcion='".$descripcion."', imagen='". $imagenEscapes ."' WHERE id=".$idT;
            
            $mysqli->query($sql);

            # Cogemos el identificador con que se ha guardado
            $id=$mysqli->insert_id;

            # Mostramos la imagen agregada
            header('Location: ../../index.php?id=3');
        }else{
            echo "<div class='error'>Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</div>";
        }
    }else{

        $sql="UPDATE servicios SET titulo='".$titulo."', descripcion='".$descripcion."', status='".$status."' WHERE id=".$idT;
        
        $mysqli->query($sql);
        header('Location: ../../index.php?id=3');
        
    }
}


function agregar($mysqli,$titulo,$descripcion){
    # Comprovamos que se haya subido un fichero
    if (is_uploaded_file($_FILES['userfile']["tmp_name"])){

        # verificamos el formato de la imagen
        if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")
        {
            $imagenEscapes=$mysqli->real_escape_string(file_get_contents($_FILES["userfile"]["tmp_name"]));

            $sql="INSERT INTO `servicios` (titulo,descripcion,`status`,imagen) VALUES   
                ('".$titulo."','".$descripcion."','1','".$imagenEscapes."')";

            
            $mysqli->query($sql);

            # Cogemos el identificador con que se ha guardado
            $id=$mysqli->insert_id;

            # Mostramos la imagen agregada
            echo "<div class='mensaje'>Imagen agregada con el id ".$id."</div>";
            header('Location: ../../index.php?id=3');
        }else{
            echo "<div class='error'>Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</div>";
        }
    }
}

 
?>
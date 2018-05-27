<?php

 
# Conectamos con MySQL
include 'conexion.php';

if(isset( $_GET["id"]))
mostrarImagen($mysqli);

if(isset( $_POST["txtTitulo"] ) && isset($_POST['txtDescripcion'] ))
agregar($mysqli,$_POST["txtTitulo"],$_POST["txtDescripcion"]);
 
# Buscamos la imagen a mostrar
function mostrarImagen($mysqli){
    $result=$mysqli->query("SELECT * FROM `carrusel` WHERE id=".$_GET["id"]);
    $row=$result->fetch_array(MYSQLI_ASSOC);
    
    # Mostramos la imagen
    echo $row["imagen"];
}


function agregar($mysqli,$titulo,$descripcion){
    # Comprovamos que se haya subido un fichero
    if (is_uploaded_file($_FILES['userfile']["tmp_name"])){

        # verificamos el formato de la imagen
        if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")
        {
            $imagenEscapes=$mysqli->real_escape_string(file_get_contents($_FILES["userfile"]["tmp_name"]));

            $sql="INSERT INTO `carrusel` (titulo,descripcion,`status`,imagen) VALUES   
                ('".$titulo."','".$descripcion."','1','".$imagenEscapes."')";

            
            $mysqli->query($sql);

            # Cogemos el identificador con que se ha guardado
            $id=$mysqli->insert_id;

            # Mostramos la imagen agregada
            echo "<div class='mensaje'>Imagen agregada con el id ".$id."</div>";
            header('Location: ../../index.php?id=2');
        }else{
            echo "<div class='error'>Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</div>";
        }
    }
}
?>
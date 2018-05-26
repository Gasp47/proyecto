<?php

# Conectamos con MySQL
$mysqli=new mysqli("localhost","root","","proyecto");
if (mysqli_connect_errno()) {
    die("Error al conectar: ".mysqli_connect_error());
}


$titulo = $_POST["txtTitulo"];
$descripcion = $_POST['txtDescripcion'];


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
    }else{
        echo "<div class='error'>Error: El formato de archivo tiene que ser JPG, GIF, BMP o PNG.</div>";
    }
}
?>
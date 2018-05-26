<?php


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
        .error {font-weight: bold; color:red;}
        .mensaje {color:#030;}
        .listadoImagenes img {float:left;border:1px solid #ccc; padding:2px;margin:2px;}
        </style>
    </head>
 
    <body>
    
    <?php
    # Conectamos con MySQL
    $mysqli=new mysqli("localhost","root","","proyecto");
    if (mysqli_connect_errno()) {
        die("Error al conectar: ".mysqli_connect_error());
    }
    
    // Los posible valores que puedes obtener de la imagen son:
    //echo "<BR>".$_FILES["userfile"]["name"];      //nombre del archivo
    //echo "<BR>".$_FILES["userfile"]["type"];      //tipo
    //echo "<BR>".$_FILES["userfile"]["tmp_name"];  //nombre del archivo de la imagen temporal
    //echo "<BR>".$_FILES["userfile"]["size"];      //tamaño
    
    # Comprovamos que se haya subido un fichero
    if (is_uploaded_file($_FILES["userfile"]["tmp_name"]))
    {
        # verificamos el formato de la imagen
        if ($_FILES["userfile"]["type"]=="image/jpeg" || $_FILES["userfile"]["type"]=="image/pjpeg" || $_FILES["userfile"]["type"]=="image/gif" || $_FILES["userfile"]["type"]=="image/bmp" || $_FILES["userfile"]["type"]=="image/png")
        {
            # Cogemos la anchura y altura de la imagen
            $info=getimagesize($_FILES["userfile"]["tmp_name"]);
            echo "<BR>".$info[0]; //anchura
            echo "<BR>".$info[1]; //altura
            echo "<BR>".$info[2]; //1-GIF, 2-JPG, 3-PNG
            echo "<BR>".$info[3]; //cadena de texto para el tag <img
    
            # Escapa caracteres especiales
            $imagenEscapes=$mysqli->real_escape_string(file_get_contents($_FILES["userfile"]["tmp_name"]));
    
            # Agregamos la imagen a la base de datos
            // $sql="INSERT INTO `servicios` (titulo,descripcion,status,anchura,altura,tipo,imagen) 
            //                 VALUES ('TITULo,DEscripcion de imagen,1,'".$info[0].",".$info[1].",'".$_FILES["userfile"]["type"]."','".$imagenEscapes."')";

            // $sql="INSERT INTO `imagen` (anchura,altura,tipo,imagen) VALUES (".$info[0].",".$info[1].",'".$_FILES["userfile"]["type"]."','".$imagenEscapes."')";

            // $sql="INSERT INTO `imagen` (anchura,altura,tipo,imagen) VALUES (400,200,'".$_FILES["userfile"]["type"]."','".$imagenEscapes."')";
            
            $sql="INSERT INTO `servicios` (titulo,descripcion,'status',tipo,imagen) VALUES ('Titulo de imagen','Descripcion de la imagen',1,'".$_FILES["userfile"]["type"]."','".$imagenEscapes."')";
            
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
    
    <h2>Selecciona una imagen</h2>
    <form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
        <input name="userfile" type="file">
        <p><input type="submit" value="Guardar Imagen">
    </form>
    
    <h2>Listado de las imagenes añadidas a la base de datos</h2>
        <div class="listadoImagenes">
            <?php
            $result=$mysqli->query("SELECT * FROM imagen ORDER BY id DESC");
            if($result)
            {
                while($row=$result->fetch_array(MYSQLI_ASSOC))
                {                
                    echo "<img  src='imagen_mostrar.php?id=".$row["id"]."' width=300 height=200>";
                }
            }
            ?>
        </div>
    </body>
</html>
 
 
 
 
 
 
 
 
 
 
 

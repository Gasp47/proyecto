<?php
    # Conectamos con MySQL
    $mysqli=new mysqli("localhost","root","","proyecto");
    if (mysqli_connect_errno()) {
        die("Error al conectar: ".mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>princiapl</title>

    <link href="./css/index.css" type="text/css" rel="stylesheet">

    <link href="./css/materialize.min.css" type="text/css" rel="stylesheet">
    <link href="./css/style.css?0.0" type="text/css" rel="stylesheet">
</head>

<body>
    
    <div class="">
        <div class="row">
            <?php
                $result=$mysqli->query("SELECT * FROM `servicios` ORDER BY status DESC");
                if($result)
                {
                    while($row=$result->fetch_array(MYSQLI_ASSOC))
                    {    
                        echo "<div class='col s4'>";
                            echo "<div class='card'>";
                                echo "<div class='card-image'>";
                                    echo "<img  src='./pages/imagen_mostrar.php?id=".$row["id"]."' width=300  height=200>";
                                    echo "<span class='card-title'>".$row["titulo"]."</span>";
                                echo "</div>";

                                echo "<div class='card-content'>";
                                    $tamaño = strlen ($row["descripcion"]);
                                    if($tamaño > 200){
                                        $tamaño = 200;
                                    }

                                    echo "<p>".substr( $row["descripcion"],0,$tamaño)."...</p>";
                                echo "</div>";

                                echo "<div class='card-action'>";
                                    echo "<div class='row'>";
                                        echo "<a href='#' value='".$row["id"]."' onclick='M.toast({html: `".$row["id"]."`, classes: `rounded`})'>EDITAR PUBLICIÓN</a>";
                                        
                                        if($row["status"] == 1){
                                            echo "<a class='text-color-green right'>";
                                                echo "<i class='material-icons right'>check</i>Activo";
                                            echo "</a>";   
                                        }else{
                                            echo "<a class='text-color-red right'>";
                                                echo "<i class='material-icons right'>clear</i>Inactivo";
                                            echo "</a>";
                                        }

                                    echo "</div>";
                                echo "</div>";  

                            echo "</div>";
                        echo "</div>";
                    }
                }
            ?>
               
        </div>
    </div>

    

    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red modal-trigger" href="#modal1">
            <i class="large material-icons" href="#modal1">add</i>
        </a>
    </div>

    <script src="./js/jquery.js"></script>
    <script src="./js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $('.fixed-action-btn').floatingActionButton();
            $('.materialboxed').materialbox();
            $('.slider').slider();
            $('.carousel').carousel();
            $('.modal').modal();
        });
    </script>
</body>

<!-- Modal Agregar -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4>NUEVO REGISTRO</h4>
    
        <div class="row">
            <form enctype="multipart/form-data" action="pages/agregarServicio.php" method="post" class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input  name="txtTitulo" type="text" required class="validate">
                        <label for="first_name">Título del contenido</label>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="input-field col s12">
                        <textarea name="txtDescripcion" required class="materialize-textarea"></textarea>
                        <label for="textarea1">Descripción del contenido</label>
                    </div>  
                </div>
                <div class="row">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Seleccione una imagen</span>
                            <input name="userfile" required type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <!-- <button type="submit">ENVIAR</button> -->
                <div class="fixed-action-btn">
                    <button type="submit" class="btn-floating btn-large red modal-trigger" href="#">
                        <i class="large material-icons" href="#">save</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    
   
</div>

</html>
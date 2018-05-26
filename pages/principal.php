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


    <link href="./css/index.css" type="text/css" rel="stylesheet">

    <link href="./css/materialize.min.css" type="text/css" rel="stylesheet">
    <link href="./css/style.css?0.0" type="text/css" rel="stylesheet">
</head>

<body>
    <div class="">
        <div class="row">
            <?php
                $result=$mysqli->query("SELECT * FROM servicios ORDER BY id DESC");
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
                                    echo "<p>".$row["descripcion"]."</p>";
                                echo "</div>";

                                echo "<div class='card-action'>";
                                    echo "<div class='row'>";
                                        echo "<a href='#' onclick='M.toast({html: `hola`, classes: `rounded`})'>Editar...</a>";
                                        echo "<a class='switch right'>";
                                            echo "<label>";
                                                echo "Inactivo";
                                                echo "<input type='checkbox'>";
                                                echo "<span class='lever'></span>";
                                                echo "Activo";
                                            echo "</label>";
                                        echo "</a>";
                                    echo "</div>";
                                echo "</div>";  

                            echo "</div>";
                        echo "</div>";
                    }
                }
            ?>
                                                
                                                
                                                
                                                
                                            
                                        
                


        </div>
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
        });
    </script>
</body>

</html>
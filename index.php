<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto</title>

    <link href="css/index.css" type="text/css" rel="stylesheet">

    <link href="css/materialize.min.css" type="text/css" rel="stylesheet">
    <link href="css/style.css?0.0" type="text/css" rel="stylesheet">
</head>
<body>
<header>

<?php 
    function saludar(){
        echo "Hola mundo";
    }
?>
        <nav>
            <!-- navbar content here  -->
            <div class="nav-wrapper #9ccc65 light-green lighten-1">
                <a href="#" class="brand-logo">
                    <?php 
                        try{
                            if(isset( $_GET["id"] ) ){
                                switch ($_GET["id"] ){
                                    case 1:
                                        echo "Menú Principal";
                                        break;
                                    case 2:
                                        echo "Carrusel";
                                        break;
                                    case 3:
                                        echo "Servicios";
                                        break;
                                    case 4:
                                        echo "Galería";
                                        break;
                                    default:
                                        echo "Menú Principal";
                                        break;
                
                                }
                            }else{
                                echo "Ninguno válido";
                            }
                        }catch (Exception $e){
                            echo "Mal";
                        }
                        
                    ?>
                </a>
                <a href="#" data-target="nav-mobie" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="#" data-target="nav-mobie"><i class="material-icons right">exit_to_app</i>Cerrar Sesión</a></li>
                </ul>
            </div>
        </nav>

        <ul id="nav-mobie" class="sidenav sidenav-fixed svFixed sidenavLeft #dcedc8 light-green lighten-4">
            <li>
                <div class="user-view">
                    <div class="background">
                        <img class="foto" src="img/imagen.jpg">
                    </div>
                    <a href="#user"><img class="circle" src="img/avatar.png"></a>
                    <a href="#name"><span class="white-text name">Gaspar Carrillo</span></a>
                    <a><span class="white-text email">gasparcarrillo@gmail.com</span></a>
                </div>
            </li>
            
            <li class="bold">
                <a href="index.php?id=1" class="waves-effect waves-teal">
                    <i class="material-icons">home</i> Home
                </a>
            </li>
            <li class="bold">
                <a href="index.php?id=2" class="waves-effect waves-teal">
                    <i class="material-icons">image</i> Carrusel
                </a>
            </li>
            <li class="bold">
                <a href="index.php?id=3" class="waves-effect waves-teal">
                    <i class="material-icons">image</i> Servicios
                </a>
            </li>
            <li class="bold">
                <a href="index.php?id=4" class="waves-effect waves-teal">
                    <i class="material-icons">collections</i> Galería
                </a>
            </li>

            <li class="sidenav">
                <a class="center" href="#"><i class="material-icons right">exit_to_app</i>Cerrar Sesión</a>
            </li>
        </ul>

    </header>

    <main>
        <?php 
            try{
                if(isset( $_GET["id"] ) ){
                    switch ($_GET["id"] ){
                        case 1:
                            
                            break;
                        case 2:
                            include 'pages/principal.php';
                            break;
                        case 3:
                            
                            break;
                        case 4:
                            
                            break;
                        default:
                            echo "Ninguno válido";
                            break;
    
                    }
                }else{
                    echo "Ninguno válido";
                }
            }catch (Exception $e){
                echo "Mal";
            }
            
        ?>
    </main>




    <script src="js/jquery.js"></script>
    <script src="js/materialize.min.js"></script>
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


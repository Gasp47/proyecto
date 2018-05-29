<?php


session_start();
// $_SESSION['sesion'] = 1;

// header('Location: ../index.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesión</title>

    <link href="../css/index.css" type="text/css" rel="stylesheet">

    <link href="../css/materialize.min.css" type="text/css" rel="stylesheet">
    <link href="../css/style.css?0.0" type="text/css" rel="stylesheet">
</head>
<body class="back">



    
    <div class="section container text-center">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card login-wrapeer">
                    <div class="card-content">
                        <div id="CustomerLoginForm">
                    
                        
                            <h4 class="center">LOGIN</h4>
                                
                            <form enctype="multipart/form-data" class="center" action="DAO/iniciarsesion.php" method="post">
                                
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">person</i>
                                        <input required name="txtUsuario" id="usuario" type="text">
                                        <label for="usuario">Usuario</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">vpn_key</i>
                                        <input required name="txtContrasenia" id="password" type="password" >
                                        <label for="password">Contraseña</label>
                                    </div>
                                </div>
                                
                                <button class="btn waves-effect waves-light" type="submit" name="action">iniciar sesión
                                    <i class="material-icons right">clock</i>
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
            <div class="col s12 m4 offset-m4">
                <div class="card">
                    <h5 style="display:none;" id="error1" class="center text-color-red"><i class="material-icons">close</i> USUARIO NO ENCONTRADO</h5>
                    <h5 style="display:none;" id="error2" class="center text-color-red"><i class="material-icons">close</i> CONTRASEÑA INCORRECTA</h5>
                </div>
            </div>
        </div>

        <?php
        if(isset ($_GET['msj'])){
            switch($_GET['msj']){
                case 1:
                    echo "<script>";
                    echo "error1();";
                    echo "function error1(){";
                        echo "document.getElementById('error1').style.display = 'block';";
                    echo "}";
                    echo "</script>";
                    break;
                case 2:
                    echo "<script>";
                    echo "error2();";
                    echo "function error2(){";
                        echo "document.getElementById('error2').style.display = 'block';";
                    echo "}";
                    echo "</script>";
                    break;
            }
        }
        ?>
        <script>
            function error1(){
                document.getElementById("error1").style.display = "noe";
            }
            
        </script>
       
        <script src="../js/jquery.js"></script>
        <script src="../js/materialize.min.js"></script>
        <script>
            $(document).ready(function() {
                M.updateTextFields();
            });
        </script>
</body>
</html>
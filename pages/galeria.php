
<?php
    include 'DAO/conexion.php';
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

    <?php
        $result=$mysqli->query("SELECT * FROM `galeria` ORDER BY status DESC");
        if($result){
            while($row=$result->fetch_array(MYSQLI_ASSOC)){ 
                ?>
                <div class="row">
                    <div class="col s12 m6">
                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class="row valign-wrapper">
                                <div class="col s4 left">
                                    <?php echo "<img src='./pages/DAO/galeriaDAO.php?id=".$row["id"]."' alt='' class='circle responsive-img'>" ?>
                                </div>
                            <div class="col s8">
                                <span class="black-text titulo-imagen">
                                <?php echo $row["titulo"]; ?>
                                </span>
                                <br>
                                <br>
                                <a class='modal-trigger negritas subrayado right' href='#modal2' onclick='mostrarCliente(this.parentElement)' dir='".$row["id"]."' value='".$row["id"]."'>EDITAR PUBLICACIÓN</a>
                            </div>
                        </div>
                    </div>
                </div>
            
                <?php
            }
        }
                ?>


                

                <?php
                $result=$mysqli->query("SELECT * FROM `galeria` ORDER BY status DESC");
                if($result){
                    while($row=$result->fetch_array(MYSQLI_ASSOC)){ 

                        
                        echo "<div class='col s4'>";
                            echo "<div  class='card'>";
                                echo "<div class='card-image'>";
                                    echo "<img class='imagen-imagen' src='./pages/DAO/servicioDAO.php?id=".$row["id"]."' width=300  height=200>";
                                    echo "<span class='card-title titulo-imagen CardTitulo'>".$row["titulo"]."</span>";
                                echo "</div>";

                                echo "<div class='card-content'>";
                                    $tamaño = strlen ($row["descripcion"]);
                                    if($tamaño > 150){
                                        $tamaño = 150;
                                    }

                                    echo "<p class='descripcion-imagen '>".substr( $row["descripcion"],0,$tamaño)."...</p>";
                                echo "</div>";

                                echo "<div class='card-action'>";
                                    echo "<div class='row'>";
                                        echo "<a class='modal-trigger negritas subrayado' href='#modal2' onclick='mostrarCliente(this.parentElement)' dir='".$row["id"]."' value='".$row["id"]."'>EDITAR PUBLICACIÓN</a>";
                                        
                                        echo "<span style='display:none;'class='id-imagen'>".$row["id"]."</span>";
                                        echo "<span style='display:none;'class='titulo-imagen'>".$row["titulo"]."</span>";
                                        echo "<span style='display:none;' class='descripcion-imagen'>".$row["descripcion"]."</span>";
                                        echo "<span style='display:none;' class='status-imagen'>".$row["status"]."</span>";
                                        
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
            <a class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-tooltip="Agregar una publicación" href="#modal1">
                <i class="large material-icons" href="#modal1">add</i>
            </a>
        </div>


        <!-- Modal Agregar -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>NUEVO REGISTRO</h4>

                <div class="row">
                    <form enctype="multipart/form-data" action="pages/DAO/servicioDAO.php?case=1" method="post" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="txtTitulo" type="text" required class="validate">
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
                                    <input name="userfile" required type="file" accept="image/x-png,image/gif,image/jpeg">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- <button type="submit">ENVIAR</button> -->
                        <div class="fixed-action-btn">
                            <button type="submit" class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-tooltip="Guardar Cambios" href="#">
                        <i class="large material-icons" href="#">save</i>
                    </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript">
          
            
           
            function mostrarCliente(contenedor) {
                var modal = document.getElementById('modal2');

                // modal.getElementsByClassName('id-modal')[0].innerText = contenedor.getElementsByClassName('id-imagen')[0].innerText;
                // Cliente
                modal.getElementsByClassName('titulo-modal')[0].innerText = document.getElementsByClassName('titulo-imagen')[0].innerText;
                // Descripcion
                // modal.getElementsByClassName('descripcion-modal')[0].innerText = contenedor.getElementsByClassName('descripcion-imagen')[0].innerText;

                // modal.getElementsByClassName('statul-modal')[0].innerText = contenedor.getElementsByClassName('status-imagen')[0].innerText;
                
                
                var midiv = document.createElement("div");
                    if( contenedor.getElementsByClassName('status-imagen')[0].innerText == '1'){
                          
                        document.getElementById("checkHere").checked=true;
                    }else{
                        document.getElementById("checkHere").checked=false;
                    }
                    
                    
              

            }
        </script>

        <!-- Modal Editar -->
        <div id="modal2" class="modal">
            <div class="modal-content">

                <div class="row">


                    <div class="col s6">
                        <h4>EDITAR REGISTRO</h4>
                    </div>


                </div>


                <div class="row">
                    <form enctype="multipart/form-data" action="pages/DAO/servicioDAO.php?case=2" method="post" class="col s12">
                        <div class="row">
                            <div class="col s12">
                                <div class='switch right'> 
                                    <label> <a class='text-color-red'>INACTIVO</a> 
                                        <input type='hidden' name='txtCheck' value='0'> 
                                        <input id="checkHere" type='checkbox' name="txtCheck" value='1'> 
                                        <span value="0" class='lever'></span> 
                                        <a class='text-color-green'>ACTIVO</a> 
                                    </label>
                                </div>
                            </div>
                            <div class="col s12">
                                <label>Título del contenido</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea name="txtTitulo" required class="materialize-textarea titulo-modal"></textarea>
                                <textarea name="txtId" style="display:none;" required class="materialize-textarea id-modal"></textarea>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col s12">
                                <label>Descripción del contenido</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea name="txtDescripcion" required class="materialize-textarea descripcion-modal"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Seleccione una imagen</span>
                                    <input name="userfile" type="file" accept="image/x-png,image/gif,image/jpeg">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- <button type="submit">ENVIAR</button> -->
                        <div class="fixed-action-btn">
                            <button type="submit" class="btn-floating btn-large red modal-trigger tooltipped" data-position="left" data-tooltip="Guardar Cambios" href="#">
                        <i class="large material-icons" href="#">edit</i>
                    </button>
                        </div>
                    </form>
                </div>
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
                $('.modal').modal();
                $('.tooltipped').tooltip();
            });
        </script>
    </body>



    </html>

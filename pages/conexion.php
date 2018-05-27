<?php
    # Conectamos con MySQL
    $mysqli=new mysqli("localhost","root","","proyecto");
    if (mysqli_connect_errno()) {
        die("Error al conectar: ".mysqli_connect_error());
    }
?>
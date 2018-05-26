<?php

 
# Conectamos con MySQL
$mysqli=new mysqli("localhost","root","","proyecto");
if (mysqli_connect_errno()) {
    die("Error al conectar: ".mysqli_connect_error());
}
 
# Buscamos la imagen a mostrar
$result=$mysqli->query("SELECT * FROM `servicios` WHERE id=".$_GET["id"]);
$row=$result->fetch_array(MYSQLI_ASSOC);
 
# Mostramos la imagen
echo $row["imagen"];
?>
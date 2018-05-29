<?php

    if(!$_SESSION)
    session_start();
   if(isset ($_SESSION['sesion']) ){
             // Esto es la página

             include 'pages/DAO/conexion.php';
?>

  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="./css/index.css" type="text/css" rel="stylesheet">

    <link href="./css/materialize.min.css" type="text/css" rel="stylesheet">
    <link href="./css/style.css?0.0" type="text/css" rel="stylesheet">
</head>
<body>
    
</body>
</html>

  <?php
}else{
    header('Location: ../pages/login.php');
   }
?>
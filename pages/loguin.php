<?php


session_start();
$_SESSION['usuario'] = 1;

echo $_SESSION['usuario'];
header('Location: ../index.php');
?>
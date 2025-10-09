<?php
session_start();
unset($_SESSION["usuario"]); // Destruir a variável de sessão
header("location: login.php");
?>

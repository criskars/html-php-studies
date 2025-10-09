<?php require_once("../../conexao/conexao.php");
session_start();

if (!isset($_SESSION["usuario"])) {
    header("location: login.php");
    // Redirecionar o visitante de volta para a página 1
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP Integração com MySQL</title>

    <!-- estilo -->
    <link href="_css/estilo.css" rel="stylesheet">
</head>

<body>
    <?php include_once("../_incluir/topo.php"); ?>
    <?php include_once("../_incluir/funcoes.php"); ?>

    <main>
        <?php

        echo "Olá " . $_SESSION["usuario"];

        ?>
    </main>

    <?php include_once("../_incluir/rodape.php"); ?>
</body>

</html>

<?php
// Fechar conexao
mysqli_close($con);
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    $_salada = array("imagens/laranja.jpg", "imagens/maca.jpg", "imagens/abacate.jpg");
    if (isset($_GET["codigo"])) {
        $codigo = $_GET["codigo"];
    } else {
        echo "Nenhum código informado";
    }
    ?>
    <img src="<?php if (isset($codigo)) {
                    echo $_salada[$codigo];
                } else {
                    echo "imagens/nada.jpg";
                } ?>" alt="Imagem" width="300">
</body>

</html>
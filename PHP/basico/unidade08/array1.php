<?php
$_salada = array("Banana", "Maçã", "Morango");
$_salada[3] = "Uva";
$_salada[] = "Abacaxi";
$_salada[] = 43483864;
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    echo implode(", ", $_salada) . "<br>";
    echo $_salada[0] . "<br>";
    echo $_salada[1] . "<br>";
    echo $_salada[2] . "<br><br>";
    echo var_dump($_salada) . "<br><br>";
    echo strlen($_salada[1]) . "<br>";
    echo mb_strlen($_salada[1]) . "<br>";
    echo mb_detect_encoding($_salada[1]) . "<br><br>";
    // O mb_strlen e o mb_detect_encoding servem para trabalhar com acentuação
    // e caracteres especiais, como ç, ã, ê, etc.
    // O strlen retorna a quantidade de bytes, e em UTF-8, caracteres especiais tem mais do que 1 byte.
    // O mb_detect_encoding detecta a codificação da string.
    // e o mb_strlen retorna a quantidade de caracteres, desconsiderando a codificação.
    echo print_r($_salada, true) . "<br><br>";
    echo gettype($_salada) . "<br><br>";
    echo is_array($_salada) ? "É um array" . "<br><br>" : "Não é um array" . "<br><br>";
    echo count($_salada) . "<br>";
    ?>
</body>

</html>
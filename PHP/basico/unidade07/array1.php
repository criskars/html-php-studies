<?php
$_frutas = array("Banana", "Maçã", "Morango");
$_frutas[3] = "Uva";
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    echo implode(", ", $_frutas) . "<br>";
    echo $_frutas[0] . "<br>";
    echo $_frutas[1] . "<br>";
    echo $_frutas[2] . "<br><br>";
    echo var_dump($_frutas) . "<br><br>";
    echo strlen($_frutas[1]) . "<br>";
    echo mb_strlen($_frutas[1]) . "<br>";
    echo mb_detect_encoding($_frutas[1]) . "<br><br>";
    echo print_r($_frutas) . "<br><br>";
    echo gettype($_frutas) . "<br><br>";
    echo is_array($_frutas) ? "É um array" . "<br>" : "Não é um array" . "<br>";
    ?>
</body>

</html>
<?php
$salario = 800;
$meses   = 3;
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    // Multiplicacao e Divisao
    echo "Multiplicação: " . ($salario * $meses) . "</br>";
    echo "Divisão: " . ($salario / $meses) . "</br>";

    // Exponencial
    echo "Exponencial: " . pow(6, 3) . "</br>";

    // Raiz Quadrada
    echo "Exponencial: " . sqrt(16) . "</br>";

    // Randômico Generica
    echo "Randomico: " . rand() . "</br>";

    // Randômico entre um intervalo
    echo "Randomico no intervalo: " . rand(1, 5) . "</br>";

    // Valor absoluto
    echo "Valor absoluto: " . abs(-200) . "</br>";
    ?>
</body>

</html>
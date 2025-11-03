<?php
$_megasena = array(24, 4, 8, 13, 33, 54);
sort($_megasena);
// sort() ordena o array em ordem crescente
// rsort() ordena o array em ordem decrescente
// shuffle() embaralha os elementos do array
// array_reverse() inverte a ordem dos elementos do array
// O sort() e o rsort() alteram o array original
// O shuffle() e o array_reverse() não alteram o array original
// Para manter o array original, use o array_reverse() ou o shuffle()
// Exemplo: $_megasena_ordenada = array_reverse($_megasena);
// Exemplo: $_megasena_embaralhada = shuffle($_megasena);
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>
    <pre>
    <?php
    echo implode(", ", $_megasena) . "<br><br>";
    print_r($_megasena);
    echo min($_megasena) . "<br>";
    echo max($_megasena) . "<br>";
    echo array_sum($_megasena) . "<br>";
    echo array_product($_megasena) . "<br>";
    ?>
    </pre>
</body>

</html>
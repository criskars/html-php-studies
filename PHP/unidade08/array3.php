<?php
$_salada = array("Banana", "Maçã", "Morango");
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
    echo "Posição do $_salada[2] na salada: " . array_search("Morango", $_salada) . "<br>";
    echo in_array("Maçã", $_salada) ? "Existe Maçã na salada" . "<br>" : "Não existe Uva na salada" . "<br>";
    ?>
    </pre>
</body>

</html>
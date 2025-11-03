<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CURSO PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    $_sorteio1 = array("", "", "", "", "", "");
    for ($_contador = 0; $_contador < count($_sorteio1); $_contador++) {
        $_sorteio1[$_contador] = rand(1, 60);
        // Aqui o número sorteado é adicionado ao array antes de fazer a comparação com os anteriroes.
        // O segundo loop se encarrega de comparar o número novo no array com os anteriores. Poderia ser um do while no lugar do segundo for.
        for ($_contador2 = 0; $_contador2 < $_contador; $_contador2++) {
            if ($_sorteio1[$_contador] == $_sorteio1[$_contador2]) {
                $_contador--;
            }
        }
    }
    echo "Sorteio 1 - Números sorteados: ";
    foreach ($_sorteio1 as $_numero) {
        echo $_numero . " ";
    }
    echo "<br><br>";

    $possibilidades = range(1, 60); // cria um array com os valores de 1 até 60
    shuffle($possibilidades);       // embaralha os valores
    $_sorteio2 = array_slice($possibilidades, 0, 6); // pega os 6 primeiros valores únicos

    echo "Sorteio 2 - Números sorteados: ";
    foreach ($_sorteio2 as $_numero) {
        echo $_numero . " ";
    }
    echo "<br><br>";

    // O código abaixo já geram os números sorteados em ordem crescente.

    $possibilidades = range(1, 60); // cria um array com os valores de 1 até 60
    $_sorteio3 = array_rand(array_flip($possibilidades), 6); // pega 6 índices únicos aleatórios, que foram invertidos com os valores originais do array $possibilidades.

    echo "Sorteio 3 - Números sorteados: ";
    foreach ($_sorteio3 as $_numero) {
        echo $_numero . " ";
    }
    echo "<br><br>";

    // Já esse método precisaria passar por sort para ordenar os números sorteados.

    $_sorteio4 = [];
    while (count($_sorteio4) < 6) {
        $_sorteado = rand(1, 60);
        if (!in_array($_sorteado, $_sorteio4)) {
            $_sorteio4[] = $_sorteado; // Adiciona o número sorteado ao array apenas depois de verificar se o número não está presente nele.
            // Como a condição do while já verifica o tamanho do array, não há necessidade de incrementar um contador. O tamanho do array aumenta a cada sucesso na verificação.
        }
    }
    echo "Sorteio 4 - Números sorteados: ";
    foreach ($_sorteio4 as $_numero) {
        echo $_numero . " ";
    }

    ?>
</body>

</html>
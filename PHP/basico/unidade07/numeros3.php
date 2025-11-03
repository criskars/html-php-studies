<?php
$gas = 4.49;
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>


    <?php
    // arredondar para media
    echo "O preço da gasolina é $gas <br>";
    echo "O preço da gasolina arredondado para média é " . round($gas) . "<br>"; // arredonda para o mais próximo
    echo "O preço da gasolina arredondado para média com 1 casa decimal é " . round($gas, 1) . "<br>"; // arredonda para o mais próximo com 1 casa decimal
    echo "O preço da gasolina arredondado para média com 2 casas decimais é " . round($gas, 2) . "<br><br>"; // arredonda para o mais próximo com 2 casas decimais

    // arredondar para cima
    echo "O preço da gasolina é $gas <br>";
    echo "O preço da gasolina arredondado para cima é " . ceil($gas) . "<br><br>"; // arredonda para o inteiro mais próximo, sempre para cima

    // arredondar para baixo
    echo "O preço da gasolina é $gas <br>";
    echo "O preço da gasolina arredondado para baixo é " . floor($gas) . "<br>"; // arredonda para o inteiro mais próximo, sempre para cima



    ?>


</body>

</html>
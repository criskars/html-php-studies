<?php
$_nome = "Curso PHP Fundamental";
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>

    <?php
    // strlen - Retorna tamanho da string
    echo "Resultado strilen: " . strlen($_nome);
    echo "<br>";

    // stripos  - Retorna primeira ocorrência 
    echo "Resultado stripos: " . stripos($_nome, "P");
    echo "<br>";

    // strripos - Retorna última ocorrência
    echo "Resultado strripos: " . strripos($_nome, "P");
    echo "<br>";

    // strtolower - converte para letras min.
    echo "Resultado strtolower: " . strtolower($_nome);
    echo "<br>";

    // strtoupper - converte para letras min.
    echo "Resultado strtoupper: " . strtoupper($_nome);
    echo "<br>";

    // SUBSTR_COUNT - Conta quantas ocorreram
    echo "Resultado substr_count: " . substr_count($_nome, "u");
    echo "<br>";
    // Conta quantas vezes um caractere apareceu dentro de um texto ou string

    // Faz diferença Maiusculas e minusculas

    // Contém substring?
    echo "Resultado str_contains: ";
    echo str_contains("Olá Mundo", "Mundo")  ? 'true' : 'false'; // true
    echo "<br>";

    // Começa com?
    echo "Resultado str_starts_with: ";
    echo str_starts_with("Olá Mundo", "Olá")  ? 'true' : 'false'; // true
    echo "<br>";

    // Termina com?
    echo "Resultado str_ends_with: ";
    echo str_ends_with("Olá Mundo", "Mundo")  ? 'true' : 'false'; // true
    echo "<br>";

    // Suporte a Unicode 
    echo "Suporte a unicode usando mb_strtoupper: ";
    echo mb_strtoupper("áéíóú"); // "ÁÉÍÓÚ"

    // echo mb_trim(" Olá Mundo "); // "Olá Mundo" - esse comando só funciona no PHP 8.4 ou superior

    ?>


</body>

</html>
<?php
$_name = "Cristian";
$_phone = "(99) 99999-9999";
$_smoker = null;
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    echo isset($_name) ? "Nome: $_name" . "<br>" : "Nome não definido" . "<br>";
    echo isset($_phone) ? "Telefone: $_phone" . "<br>" : "Telefone não definido" . "<br>";
    echo isset($_smoker) ? "É fumante" . "<br>" : "Não é fumante" . "<br>";
    echo isset($_email) ? "Tem e-mail" . "<br>" : "Não tem e-mail" . "<br>";

    // Basicamente o isset() verifica se a variável foi definida e se o valor é diferente de null.
    ?>
</body>

</html>
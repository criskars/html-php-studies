<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>
    <?php

    if (!isset($_POST["nome"]) || !isset($_POST["email"])) {
        echo "Você não enviou os dados corretamente. <br>";
        echo "<a href='formulario.php'>Clique aqui para voltar</a>";
        exit;
    }

    $nome = $_POST["nome"];
    $email = $_POST["email"];

    // outra forma de fazer seria com operador ternário
    // $nome = isset($_POST["nome"]) ? $_POST["nome"] : "não informado";
    // $email = isset($_POST["email"]) ? $_POST["email"] : "não informado";

    echo "O nome informado foi <strong>$nome</strong>.<br>";
    echo "O email informado foi <strong>$email</strong>.<br>";
    print_r($_POST);

    ?>
</body>

</html>
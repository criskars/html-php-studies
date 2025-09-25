<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
    <link href="_css/estilo.css" rel="stylesheet">
</head>

<body>
    <?PHP if (!isset($_POST["formulario2"])) { ?>
        <form action="" method="post">
            <label for="nome">Nome Completo</label>
            <input type="text" name="nome" id="nome">

            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <input type="submit" name="formulario2" value="Enviar Cadastro">
        </form>
    <?PHP } else {
        echo "Seu nome é " . $_POST["nome"] . "<br>";
        echo "Seu email é " . $_POST["email"] . "<br>";
    } ?>
</body>

</html>
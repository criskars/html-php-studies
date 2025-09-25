<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
    <link href="_css/estilo.css?v=<?= time() ?>" rel="stylesheet">
</head>

<body>
    <form action="destino.php" method="post">
        <label for="nome">Nome Completo</label>
        <input type="text" name="nome" id="nome">

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <input type="submit" value="Enviar Cadastro">
    </form>
</body>

</html>
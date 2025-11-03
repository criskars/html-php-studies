<?php
$_name = null;
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
    echo is_null($_name) ? "É nulo" . "<br>" : "Não é nulo" . "<br>";
    ?>
</body>

</html>
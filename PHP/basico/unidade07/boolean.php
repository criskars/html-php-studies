<?php
$_smoker = false;
$_employed = true;
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    echo $_smoker ? "É fumante" . "<br>" : "Não é fumante" . "<br>";
    echo $_employed ? "Está empregado" . "<br><br>" : "Não está empregado" . "<br><br>";
    echo var_dump($_smoker) . "<br>";
    echo var_dump($_employed) . "<br><br>";
    echo gettype($_smoker) . "<br>";
    echo gettype($_employed) . "<br><br>";
    echo is_bool($_smoker) ? "É booleano" . "<br>" : "Não é booleano" . "<br>";
    echo is_bool($_employed) ? "É booleano" . "<br><br>" : "Não é booleano" . "<br><br>";
    ?>
</body>

</html>
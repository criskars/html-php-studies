<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CURSO PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    $_calendar = array(
        "name" => "Cris",
        "phone" => "11999999999",
        "salary" => 2500,
        "smoker" => true
    );
    foreach ($_calendar as $_contact => $_value) {
        echo "Chave: " . $_contact . " - Valor: " . $_value . "<br>";
    }
    ?>
</body>

</html>
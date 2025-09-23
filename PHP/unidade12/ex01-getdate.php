<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    date_default_timezone_set("America/Sao_Paulo");
    $data = getdate();
    echo "Hoje é dia " . $data['mday'] . " do " . $data['mon'] . " de " . $data['year'] . "<br>";
    echo "Hoje é dia " . $data['weekday'] . "<br>";
    echo "Mês: " . $data['month'] . "<br>";
    echo "Hora: " . $data['hours'] . ":" . $data['minutes'] . ":" . $data['seconds'] . "<br>";
    ?>
</body>

</html>
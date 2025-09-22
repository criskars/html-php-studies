<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURSO PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    $_dia = "segunda-feira";
    if ($_dia == "sábado" || $_dia == "domingo") {
        echo "Hoje é final de semana" . "<br>";
    } else {
        echo "Dia de trabalho" . "<br>";
    }
    $_age = 21;
    $_gender = "M";

    if ($_age >= 18 && $_gender == "F") {
        echo "Pode entrar na festa" . "<br>";
    } else if ($_age >= 18 && $_gender == "M") {
        echo "Apenas mulheres podem entrar na festa" . "<br>";
    }
    else {
        echo "Menor de idade, não pode entrar" . "<br>";
    }

    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURSO PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    $_dia = "quarta-feira";
    switch ($_dia) {
        case "segunda-feira":
            echo "Hoje é segunda-feira";
            break;
        case "terça-feira":
            echo "Hoje é terça-feira";
            break;
        case "quarta-feira":
            echo "Hoje é quarta-feira";
            break;
        case "quinta-feira":
            echo "Hoje é quinta-feira";
            break;
        case "sexta-feira":
            echo "Hoje é sexta-feira";
            break;
        case "sábado":
            echo "Hoje é sábado";
            break;
        case "domingo":
            echo "Hoje é domingo";
            break;
        default:
            echo "Dia inválido";
    }
    ?>
</body>

</html>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    $_agora = new dateTime();

    $_formatter = new IntlDateFormatter(
        'pt_BR',
        IntlDateFormatter::FULL,
        IntlDateFormatter::FULL,
        'America/Sao_Paulo',
        IntlDateFormatter::GREGORIAN
    );

    echo $_formatter->format($_agora);
    ?>
</body>

</html>
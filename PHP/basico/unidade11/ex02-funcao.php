<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>CURSO PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    function converterFC($_temperatura)
    {
        return number_format((($_temperatura - 32) * 5 / 9), 2);
    }
    echo converterFC(100) . " ºC<br>";
    echo converterFC(50) . " ºC<br>";
    echo converterFC(25) . " ºC<br>";
    echo converterFC(0) . " ºC<br>";

    function converterCF($_temperatura)
    {
        return number_format((($_temperatura * 1.8) + 32), 2);
    }
    echo converterCF(37) . " ºF<br>";
    echo converterCF(20) . " ºF<br>";
    echo converterCF(10) . " ºF<br>";
    echo converterCF(0) . " ºF<br>";
    ?>
</body>

</html>
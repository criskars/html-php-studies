<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Curso PHP FUNDAMENTAL</title>
    </head>

    <body>
        <?php
            $_date1 = new DateTime("2001-01-01 00:00:00");
            $_date2 = new DateTime();
            $_interval = date_diff($_date1, $_date2);
            echo $_interval->format("%a dias") . "<br>";
            print_r($_interval->format("%a") . " dias <br>");
            print_r($_interval->format("%y") * 12 + $_interval->format("%m") . " meses <br>");
            print_r($_interval->format("%a ") * 24 + $_interval->format("%h ") . " horas <br>");
        ?>
    </body>
</html>
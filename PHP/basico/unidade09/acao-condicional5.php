<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CURSO PHP FUNDAMENTAL</title>
    </head>
    <body>
        <?php 
            $_1 = 5;
            $_2 = "5";
            if ($_1 == $_2) {
                echo "Verdadeiro" . "<br>";
            } else {
                echo "Falso" . "<br>";
            }
            if ($_1 === $_2) {
                echo "Verdadeiro" . "<br>";
            } else {
                echo "Falso" . "<br>";
            }
        ?>
    </body>
</html>
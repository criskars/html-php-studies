<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CURSO PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    $_counter = 1;
    while ($_counter <= 10) {
        echo "Contador: $_counter <br>";
        $_counter++;
    }
    echo "<br>";
    for ($_counter = 1; $_counter <= 10; $_counter++) {
        echo "Contador: $_counter <br>";
    }
    ?>
</body>

</html>
<?php
$_name = "Cristian Karsten";
$_salary = 2500.00;
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
    <style>
        body {
            display: flex;
        }
        p {
            color: blue;
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
            margin: auto;
        }
    </style>
</head>

<body>
    <p>
        <?php
        echo $_name;
        ?>
    </p>
    <p>
        <?php
        echo " " . $_salary;
        ?>
    </p>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CURSO PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    $_salada = array("laranja", "uva", "abacate", "pera", "manga", "banana");
    foreach ($_salada as $_valor) {
        echo $_valor . "<br>";
    }
    echo "<br>";
    for ($_contador = 0; $_contador < count($_salada); $_contador++) {
        echo $_salada[$_contador] . ", ";
    }
    ?>
</body>

</html>
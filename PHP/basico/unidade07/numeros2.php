<?php
$_salary = 1095;
$_gas = 4.55;
$_telephone = "(11) 98765-4321";
// Só dá false como numérico no _telephone pq tem caracteres que não são números, se não, mesmo sendo string, daria true (string numérica válida)
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>


    <?php
    // testar se é numérica
    echo is_numeric($_salary)  ? "O salário $_salary é numérico? Sim" . "<br>" : "O salário $_salary é numérico? Não" . "<br>";
    echo is_numeric($_gas)  ? "A gasolina $_gas é numérico? Sim" . "<br>" : "A gasolina $_gas é numérico? Não" . "<br>";
    echo is_numeric($_telephone)  ? "O telefone $_telephone é numérico? Sim" . "<br><br>" : "O telefone $_telephone é numérico? Não" . "<br><br>";

    // testar se é inteiro
    echo is_int($_salary)  ? "O salário $_salary é int? Sim" . "<br>" : "O salário $_salary é numérico? Não" . "<br>";
    echo is_int($_gas)  ? "A gasolina $_gas é int? Sim" . "<br>" : "A gasolina $_gas é numérico? Não" . "<br>";
    echo is_int($_telephone)  ? "O telefone $_telephone é int? Sim" . "<br><br>" : "O telefone $_telephone é numérico? Não" . "<br><br>";

    // testar se é float
    echo is_float($_salary)  ? "O salário $_salary é float? Sim" . "<br>" : "O salário $_salary é numérico? Não" . "<br>";
    echo is_float($_gas)  ? "A gasolina $_gas é float? Sim" . "<br>" : "A gasolina $_gas é numérico? Não" . "<br>";
    echo is_float($_telephone)  ? "O telefone $_telephone é float? Sim" . "<br><br>" : "O telefone $_telephone é numérico? Não" . "<br><br>";
    ?>


</body>

</html>
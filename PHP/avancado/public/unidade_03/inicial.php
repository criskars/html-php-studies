<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "website";

$con = mysqli_connect($server, $user, $password, $database);

if (mysqli_connect_errno()) {
    die("Conexão falhou: " . mysqli_connect_error());
}

echo "Conectado ao banco de dados $database em $server com sucesso.<br>";

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP Integração com MySQL</title>
</head>

<body>

</body>

</html>
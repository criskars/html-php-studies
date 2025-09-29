<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP FUNDAMENTAL</title>
</head>

<body>
    <?php
    $host = "localhost";
    $dbname = "website";
    $username = "root";
    $password = ""; // padrão do XAMPP é senha em branco

    // Verificar conexão
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        echo "Conectado a $dbname em $host com sucesso.";

        $result = $conn->query("SELECT * FROM clientes WHERE telefone = '9999-0001' ORDER BY nomecompleto");

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>ID: " . $row['clienteID'] . "<br>";
            echo "Nome: " . $row['nomecompleto'] . "<br>";
            echo "Email: " . $row['email'] . "<br>";
            echo "Telefone: " . $row['telefone'] . "</p>";
        }
        $conn = null; // fechar a conexão

    } catch (PDOException $pe) {
        die("Não foi possível se conectar ao banco de dados $dbname :" . $pe->getMessage());
    }
    ?>
</body>

</html>